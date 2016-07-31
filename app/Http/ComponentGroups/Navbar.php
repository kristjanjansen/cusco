<?php

namespace App\Http\ComponentGroups;

use Illuminate\Http\Request;

class Navbar {

    protected function prepareLinks(Request $request)
    {
        $loggedUser = false; // $request->user();

        return collect(config('menu.header'))
            ->map(function($value, $key) {
                return [
                    'title' => trans("menu.header.$key"),
                    'route' => $value['route'],
                ];
            })
            ->putWhen(! $loggedUser, 'user', [
                'title' => trans("menu2.header.user"),
                'route' => '', //route('login.form'),
                'menu' => true,
            ])
            ->putWhen($loggedUser, 'user', [
                'title' => 'Username',//$user->name,
                'route' => '',//route('user.show', [$user]),
                'badge' => '', //$loggedUser->vars()->unreadMessagesCount()
                'image' => '', //$loggedUser->vars()->imagePreset(),
                'menu' => true,
            ])
            ->toArray();
    }

    protected function prepareSublinks(Request $request)
    {
        $loggedUser = false; // $request->user();

        return collect()
            ->pushWhen(! $loggedUser, [
                'title' => trans('menu.auth.login'),
                'route' => '', //route('login.form'),
            ])
            ->pushWhen(! $loggedUser, [
                'title' => trans('menu.auth.register'),
                'route' => '', //route('login.register'),
            ])
            ->pushWhen($loggedUser, [
                'title' => trans('menu.user.profile'),
                'route' => '', //route('user.show', [$loggedUser]),
            ])
            ->pushWhen($loggedUser, [
                'title' => trans('menu.user.edit.profile'),
                'route' => '', //route('user.edit', [$loggedUser]),
            ])
            ->pushWhen($loggedUser, [
                'title' => trans('menu.user.message'),
                'route' => '', //route('message.index', [$loggedUser]),
                'badge' => '' //$loggedUser->vars()->unreadMessagesCount()
            ])
            ->pushWhen($loggedUser, [
                'title' => trans('menu.auth.admin'),
                'route' => '', //route('content.index', ['internal']),
            ])
            ->pushWhen($loggedUser, [
                'title' => trans('menu.auth.logout'),
                'route' => '', //route('login.logout'),
            ])
            ->toArray();
    }


    public function render(Request $request)
    {

        return collect()
            ->push(component('NavbarDesktop')
                ->with('links', $this->prepareLinks())
                ->with('sublinks', $this->prepareSublinks())
                ->render()
            )
            ->push(component('NavbarMobile')
                ->with('links', $this->prepareLinks())
                ->with('sublinks', $this->prepareSublinks())
                ->render()
            )
            ->implode('');

    }

}
