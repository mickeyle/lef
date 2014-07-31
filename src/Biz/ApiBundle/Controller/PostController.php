<?php
namespace Biz\ApiBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Controller\Annotations;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class PostController extends FOSRestController
{

    const POST_HANDLER = 'biz_api.post_handler';

    /**
     * List all posts by current user.
     *
     * @ApiDoc(
     * resource = true,
     * statusCodes = {
     * 200 = "Returned when successful"
     * }
     * )
     *
     * @Annotations\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing posts.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="5", description="How many posts to return.")
     *
     * @Annotations\View(
     * templateVar="pages"
     * )
     *
     * @param Request $request
     *            the request object
     * @param ParamFetcherInterface $paramFetcher
     *            param fetcher service
     *            
     * @return array
     */
    public function getPostsAction(Request $request, ParamFetcherInterface $paramFetcher)
    {
        $offset = $paramFetcher->get('offset');
        $offset = null == $offset ? 0 : $offset;
        $limit = $paramFetcher->get('limit');
    }

    /**
     * Get single Post
     *
     * @ApiDoc(
     * resource = true,
     * description = "Gets a Post for a given id.",
     * output = "Dat\BlogBundle\Document\Post",
     * statusCodes = {
     * 200 = "Returned when successful",
     * 404 = "Returned when the page is not found"
     * }
     * )
     *
     * @param int $id
     *            the post id
     *            
     * @return array
     *
     * @throws NotFoundHttpException when post not exist
     */
    public function getPostAction($id)
    {
        $post = $this->getOr404($id);
        
        return $post;
    }

    /**
     * Create a Post from the submitted data.
     *
     * @ApiDoc(
     * resource = true,
     * description = "Creates a new post from the submitted data.",
     * input = "Biz\ApiBundle\Form\PostType",
     * statusCodes = {
     * 200 = "Returned when successful",
     * 400 = "Returned when the form has errors"
     * }
     * )
     *
     * @param Request $request
     *            the request object
     *            
     * @return FormTypeInterface View
     */
    public function postPostAction(Request $request)
    {
        try {
            $newPost = $this->get(self::POST_HANDLER)->post($request->request->all());
            
            $routeOptions = array(
                'id' => $newPost->getId(),
                '_format' => $request->get('_format')
            );
            
            return $this->routeRedirectView('api_get_post', $routeOptions, Codes::HTTP_CREATED);
        } catch (InvalidFormException $exception) {
            
            return $exception->getForm();
        }
    }

    /**
     * Update existing post from the submitted data or create a new post at a specific location.
     *
     * @ApiDoc(
     * resource = true,
     * input = "Biz\ApiBundle\Form\PageType",
     * statusCodes = {
     * 201 = "Returned when the Page is created",
     * 204 = "Returned when successful",
     * 400 = "Returned when the form has errors"
     * }
     * )
     *
     * @param Request $request
     *            the request object
     * @param int $id
     *            the page id
     *            
     * @return FormTypeInterface View
     * @throws NotFoundHttpException when page not exist
     */
    public function putPostAction(Request $request, $id)
    {
        try {
            if (! ($post = $this->get(self::POST_HANDLER)->get($id))) {
                $statusCode = Codes::HTTP_CREATED;
                $post = $this->get(self::POST_HANDLER)->post($request->request->all());
            } else {
                $statusCode = Codes::HTTP_NO_CONTENT;
                $post = $this->get(self::POST_HANDLER)->put($post, $request->request->all());
            }
            
            $routeOptions = array(
                'id' => $page->getId(),
                '_format' => $request->get('_format')
            );
            
            return $this->routeRedirectView('api_get_post', $routeOptions, $statusCode);
        } catch (InvalidFormException $exception) {
            
            return $exception->getForm();
        }
    }

    /**
     * Update existing post from the submitted data or create a new post at a specific location.
     *
     * @ApiDoc(
     * resource = true,
     * input = "Acme\DemoBundle\Form\PageType",
     * statusCodes = {
     * 204 = "Returned when successful",
     * 400 = "Returned when the form has errors"
     * }
     * )
     *
     * @param Request $request
     *            the request object
     * @param int $id
     *            the page id
     *            
     * @return FormTypeInterface View
     * @throws NotFoundHttpException when post not exist
     */
    public function patchPostAction(Request $request, $id)
    {
        try {
            $post = $this->get(self::POST_HANDLER)->patch($this->getOr404($id), $request->request->all());
            
            $routeOptions = array(
                'id' => $post->getId(),
                '_format' => $request->get('_format')
            );
            
            return $this->routeRedirectView('api_get_post', $routeOptions, Codes::HTTP_NO_CONTENT);
        } catch (InvalidFormException $exception) {
            
            return $exception->getForm();
        }
    }

    /**
     * Delete single Post
     *
     * @ApiDoc(
     * resource = true,
     * description = "Delete a Post for a given id.",
     * statusCodes = {
     * 200 = "Returned when successful",
     * 404 = "Returned when the page is not found"
     * }
     * )
     *
     * @param int $id
     *            the post id
     *            
     * @return array
     *
     * @throws NotFoundHttpException when post not exist
     */
    public function deletePostAction($id)
    {}

    protected function getOr404($id)
    {
        if (! ($post = $this->get(self::POST_HANDLER)->get($id))) {
            throw new NotFoundHttpException(sprintf('The resource \'%s\' was not found.', $id));
        }
        
        return $post;
    }
}