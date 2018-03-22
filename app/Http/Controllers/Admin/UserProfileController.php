<?php

namespace SGA\Http\Controllers\Admin;

use Illuminate\Http\Request;
use SGA\Forms\UserProfileForm;
use SGA\Http\Controllers\Controller;
use SGA\Models\User;

class UserProfileController extends Controller
{

	public function edit(User $user)
	{
		$form = \FormBuilder::create(UserProfileForm::class, [
			'url' => route('admin.users.profile.update', ['user' => $user->id]),
			'method' => 'PUT',
			'model' => $user->profile,
			'data' => ['user' => $user]
		]);
		return view('admin.users.profile.edit', compact('form'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function update(User $user)
	{
		$form = \FormBuilder::create(UserProfileForm::class);

		if (!$form->isValid()) {
			return redirect()
				->back()
				->withErrors($form->getErrors())
				->withInput();
		}

		$data = $form->getFieldValues();
		$user->profile->address?$user->profile->update($data):$user->profile()->create($data);


		session()->flash('message', 'Perfil alterado com sucesso.');
		return redirect()->route('admin.users.profile.update', ['user' => $user->id]);
	}

}
