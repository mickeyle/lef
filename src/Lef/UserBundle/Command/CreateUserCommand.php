<?php
namespace Lef\UserBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Lef\UserBundle\Exception\InvalidFormException;

class CreateUserCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this->setName("lef:user:create")
            ->setDescription("Create a user.")
            ->setDefinition(array(
            new InputArgument("username", InputArgument::REQUIRED, "The username"),
            new InputArgument("mobile", InputArgument::REQUIRED, "The mobile"),
            new InputArgument("password", InputArgument::REQUIRED, "The password")
        ))
            ->setHelp('The <info>le:user:create</info> command creates a user:');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $username = $input->getArgument('username');
        $mobile = $input->getArgument('mobile');
        $password = $input->getArgument('password');
        
        $parameters = array(
            'username' => $input->getArgument('username'),
            'mobile' => $input->getArgument('mobile'),
            'password' => $input->getArgument('password')
        );
        try {
            $newUser = $this->getContainer()
                ->get('lef_user.user.handler')
                ->post($parameters);
            
            echo var_export($newUser);
        } catch (InvalidFormException $e) {
            $errors = $e->getForm();
            $output->writeln(json_encode($errors));
        }
    }

    protected function interact(InputInterface $input, OutputInterface $output)
    {
        if (! $input->getArgument("username")) {
            $username = $this->getHelper('dialog')->askAndValidate($output, "Please choose a username:", function ($username)
            {
                if (empty($username)) {
                    throw new \Exception("Username can not be empty");
                }
                return $username;
            });
            $input->setArgument("username", $username);
        }
        if (! $input->getArgument("mobile")) {
            $username = $this->getHelper('dialog')->askAndValidate($output, "Please choose a mobile:", function ($username)
            {
                if (empty($username)) {
                    throw new \Exception("Mobile can not be empty");
                }
                return $username;
            });
            $input->setArgument("mobile", $username);
        }
        if (! $input->getArgument("password")) {
            $username = $this->getHelper('dialog')->askAndValidate($output, "Please choose a password:", function ($username)
            {
                if (empty($username)) {
                    throw new \Exception("Password can not be empty");
                }
                return $username;
            });
            $input->setArgument("password", $username);
        }
    }
}