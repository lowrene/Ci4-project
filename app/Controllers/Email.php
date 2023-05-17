<?php

namespace App\Controllers;

use App\Models\EmailModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Email extends BaseController
{
    public function index()
    {
        $model = model(EmailModel::class);

        $data = [
            'email' => $model->getEmail(),
        ];

        return view('templates/header', $data)
            . view('email/index', $data)
            . view('templates/footer');
    }

    public function view($id = null)
    {
        $model = model(EmailModel::class);

        $email = $model->getEmail($id);

        if (empty($email)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the email: ' . $id);
        }

        $data = [
            'email' => $email,
        ];

        return view('templates/header', $data)
            . view('email/view', $data)
            . view('templates/footer');
    }


    public function create()
    {
        helper('form');

        // Check if the form is submitted.
        if (! $this->request->getMethod() === 'post') {
            // The form is not submitted, so return the form.
            return view('templates/header', ['title' => 'Create an email'])
                . view('email/email_create')
                . view('templates/footer');
        }

        $data = [
            'sender_email' => $this->request->getPost('sender_email'),
            'receiver_email' => $this->request->getPost('receiver_email'),
            'message' => $this->request->getPost('message')
        ];

        // Perform validation
        if (! $this->validate([
            'sender_email' => 'required|valid_email',
            'receiver_email' => 'required|valid_email',
            'message' => 'required'
        ])) {
            // Validation failed, so return the form with errors.
            return view('templates/header', ['title' => 'Create an email'])
                . view('email/email_create', ['validation' => $this->validator])
                . view('templates/footer');
        }

        $emailModel = new EmailModel();

        if ($emailModel->insert($data)) {
            // Email created successfully.
            return redirect()->to('/email/view');
        } else {
            // Failed to create email.
            $data['error'] = 'Failed to create email.';
            return view('templates/header', ['title' => 'Create an email'])
                . view('email/email_create', $data)
                . view('templates/footer');
        }
    }



    public function edit($id)
    {
        helper('form');

        // Retrieve the email record by ID
        $emailModel = new EmailModel();
        $email = $emailModel->get_email($id);

        if (empty($email)) {
            // Email not found, show error or redirect to error page
            return redirect()->to('email')->with('error', 'Email not found.');
        }

        // Check if the form is submitted.
        if (! $this->request->getMethod() === 'post') {
            // The form is not submitted, so return the form.
            return view('templates/header', ['title' => 'Edit Email'])
                . view('email/email_edit', ['email' => $email])
                . view('templates/footer');
        }

        $data = [
            'sender_email' => $this->request->getPost('sender_email'),
            'receiver_email' => $this->request->getPost('receiver_email'),
            'message' => $this->request->getPost('message')
        ];

        // Perform validation
        if (! $this->validate([
            'sender_email' => 'required|valid_email',
            'receiver_email' => 'required|valid_email',
            'message' => 'required'
        ])) {
            // Validation failed, so return the form with errors.
            return view('templates/header', ['title' => 'Edit Email'])
                . view('email/email_edit', ['email' => $email, 'validation' => $this->validator])
                . view('templates/footer');
        }

        if ($emailModel->update_email($id, $data)) {
            // Email updated successfully.
            return redirect()->to('email');
        } else {
            // Failed to update email.
            $data['error'] = 'Failed to update email.';
            return view('templates/header', ['title' => 'Edit Email'])
                . view('email/email_edit', $data)
                . view('templates/footer');
        }
    }

    public function delete($id)
    {
        $emailModel = new EmailModel();

        if ($emailModel->delete_email($id)) {
            // Email deleted successfully.
            return redirect()->to('email');
        } else {
            // Failed to delete email.
            return redirect()->to('email')->with('error', 'Failed to delete email.');
        }
    }


}