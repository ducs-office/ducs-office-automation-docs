---
title: Authorization Policies
description: Authorization Policies responsible for authorizing user actions based on permissions and several rules.
extends: _layouts.documentation
section: content
---


[Laravel Policy](https://laravel.com/docs/7.x/authorization#creating-policies)

This is a list of all the policies we have in the application. These policies authorize actions on the resource that they are defined on.
Apart from using custom logic based on the corresponding requirement the policies throughout the application also authorize the user against essential [permissions](/docs/permissions). 

The naming convention followed is like so: 
>Note: By convention, to authorize a `update` action on `IncomingLetter` model the framework check if there exists an `IncomingLetterPolicy`, and if it does, it calls the `update` method to check if the user should be allowed to perform the action. If the Policy does not exist or method does not exist, user is _not_ allowed.

### List of policies
1. [AttachmentPolicy](#attachment-policy)
2. [CollegePolicy](#college-policy)
2. [IncomingLetterPolicy](#incoming-letter-policy)


<a name="attachment-policy"></a>
`AttachmentPoliycy` : Authorizes if the user can view and delete the attachment. The authorization here follows on whether the user can  perform the same action on the resource that the attachment belongs to.

<a name="incoming-letter-policy"></a>
`IncomingLetterPolicy` : Authorizes CRUD operations on `IncomingLetter` based on if the user has the required permission.