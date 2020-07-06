---
title: Authorization Policies
description: Authentication & Authorization logic within the application
extends: _layouts.documentation
section: content
---

## Authentication & Authorization

### Authentication

The application uses [Laravel's authentication](https://laravel.com/docs/7.x/authentication) configured out of the box.

The project started with the default guard `web` used to authenticate `users`. Every resource revolved around the staff of DUCS. Midway into the project we introduced scholars. Since their interaction with the app was seperate from that of the staff, we created a new guard named `scholars` for them. Effectively, anybody can log into the application either as a user or as a scholar and each request is authenticated using either guards. 

### Authorization

We have made use of [Laravel Policy](https://laravel.com/docs/7.x/authorization#creating-policies) to authenticate user actions.


The policies autorize actions on the resource that they are defined on. The policy methods are mapped to a controller method on its corresponding resource.

The naming convention followed is like so: 
>Note: By convention, to authorize a `update` action on `IncomingLetter` model the framework check if there exists an `IncomingLetterPolicy`, and if it does, it calls the `update` method to check if the user should be allowed to perform the action. If the Policy does not exist or method does not exist, user is _not_ allowed.


While a major chunk of actions could be authorised against [permissions](./permissions#list-of-permissions) that the user has, a few of them required a combination of permissions and custom logic as defined by the use-case.

For the first case, consider example 

````
#IncomingLetterPolicy#view

// determine if the user can view an incoming letter 

public function view(User $user, IncomingLetter $letter)
{
    return $user->can('incoming letters:view');
}
````

For the second,

````
LeavePolicy#respond

// determine if the user can respond to a scholar leave

public function respond($user, Leave $leave)
{
    return get_class($user) === User::class
        && $user->can('leaves:respond')
        && in_array($leave->status, [LeaveStatus::APPLIED, LeaveStatus::RECOMMENDED]);
}
````

Perrmissions are only created for users(i.e the office staff, faculty and the UG teachers). Since, scholars use the application to maintain their individual profiles, permissions do not govern their actions. The overlying condition is them being owner of the instance of the resource they interact with. 

Moreover, there exists a super-admin in the application allowed to act bypassing any permissions. This is to allow extra flexibility and reduce margin of error.