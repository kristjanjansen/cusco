<?php

namespace App\Http\ComponentGroups;

use Illuminate\Http\Request;

class Masthead {

/*

                'items' => [
                    'first' => [
                        'title' => 'Minu Trip.ee',
                        'route' => route('login.form'),
                        'children' => [
                            'login' => [
                                'title' => 'Logi sisse',
                                'route' => route('login.form')
                            ],
                            'register' => [
                                'title' => 'Registreeri',
                                'route' => route('register.form'),
                            ],
                        ]
                    ],
                ]
...

       @include('component.navbar.user', [
            'modifiers' => 'm-green',
            'profile' => [
                'image' => \Auth::user()->imagePreset(),
                'title' => \Auth::user()->name,
                'route' => route('user.show', [\Auth::user()]),
                'badge' => \Auth::user()->unreadMessagesCount(),
                'letter' => [
                    'modifiers' => 'm-green m-tiny',
                    'text' => 'W'
                ]
            ],
            'children' => [
                [
                    'title' => trans('menu.user.profile'),
                    'route' => route('user.show', [\Auth::user()]),
                ],
                [
                    'title' => trans('menu.user.message'),
                    'route' => route('message.index', [\Auth::user()]),
                    'badge' => \Auth::user()->unreadMessagesCount()
                ],
                [
                    'title' => trans('menu.user.edit.profile'),
                    'route' => route('user.edit', [\Auth::user()]),
                ],
                [
                    'title' => trans('menu.auth.logout'),
                    'route' => route('login.logout'),
                ]
            ]
        ])
    </div>

    @elseif(\Auth::user() && \Auth::user()->hasRole('admin'))

    <div class="c-header__user">

        @include('component.navbar.user', [
            'modifiers' => 'm-green',
            'profile' => [
                'image' => \Auth::user()->imagePreset(),
                'title' => \Auth::user()->name,
                'route' => route('user.show', [\Auth::user()]),
                'badge' => \Auth::user()->unreadMessagesCount(),
                'letter' => [
                    'modifiers' => 'm-green m-tiny',
                    'text' => 'W'
                ]
            ],
            'children' => [
                [
                    'title' => trans('menu.user.profile'),
                    'route' => route('user.show', [\Auth::user()]),
                ],
                [
                    'title' => trans('menu.user.message'),
                    'route' => route('message.index', [\Auth::user()]),
                    'badge' => \Auth::user()->unreadMessagesCount()
                ],
                [
                    'title' => trans('menu.user.edit.profile'),
                    'route' => route('user.edit', [\Auth::user()]),
                ],
                [
                    'title' => trans('menu.auth.admin'),
                    'route' => route('content.index', ['internal'])
                ],
                [
                    'title' => trans('menu.auth.logout'),
                    'route' => route('login.logout'),
                ]
            ]
        ])
    </div>

    @endif

*/

    protected function prepareUnloggedLinks()
    {
        return collect(config('menu.header'))
            ->map(function($value, $key) {
                return [
                    'title' => trans("menu.header.$key"),
                    'route' => $value['route'],
                ];
            })
            ->put('user', [
                'title' => trans("menu2.header.user"),
                'route' => '',
                'menu' => true
            ])
            ->toArray();
    }

    protected function prepareUnloggedSublinks()
    {
        return collect()
            ->push([
                'title' => trans("menu2.header.login"),
                'route' => '', //route('login.form'),
            ])
            ->push([
                'title' => trans("menu2.header.register"),
                'route' => '', // route('login.register'),
            ])
            ->toArray();
    }

    protected function prepareLoggedSublinks()
    {
        return collect()
            ->push([
                'title' => trans('menu.user.profile'),
                'route' => '', //route('user.show', [auth()->user()]),
            ])
            ->push([
                'title' => trans('menu.user.edit.profile'),
                'route' => '', //route('user.edit', [auth()->user()]),
            ])
            ->push([
                'title' => trans('menu.user.message'),
                'route' => '', //route('message.index', [auth()->user()]),
                'badge' => '' // auth()->user()->unreadMessagesCount()
            ])
            ->pushIf(auth()->check(), [
                'title' => trans('menu.auth.admin'),
                'route' => '', //route('content.index', ['internal']),
            ])
            ->push([
                'title' => trans('menu.auth.logout'),
                'route' => '', //route('login.logout'),
            ])
            ->toArray();
    }


    public function render(Request $request, $title)
    {

        return component('Masthead')
            ->with('title', $title)
            ->with('image', '/samples/header.jpg')
            ->with('search', component('Icon')
                ->with('name', 'icon-search')
                ->with('color', 'white')
            )
            ->with('logo', component('Icon')
                ->with('name', 'tripee_logo')
                ->with('width', 200)
                ->with('height', 120)
            )
            ->with('smalllogo', component('Icon')
                ->with('name', 'tripee_logo_plain')
                ->with('width', 120)
                ->with('height', 80)
                ->with('color', 'white')
            )
            ->with('navbar', component('Navbar')
                ->with('links', $this->prepareUnloggedLinks())
                ->with('sublinks', $this->prepareLoggedSubLinks())
            )
            ->with('navbar_mobile', component('NavbarMobile')
                ->with('links', $this->prepareUnloggedLinks())
                ->with('sublinks', $this->prepareLoggedSubLinks())
            );
    }

}