---
title: Account Controller
description: Account Controller responsible for account related actions
extends: _layouts.documentation
section: content
---

## AcountController

#### Brief 
Responsible for handling logic for a user's account

#### Methods
[change_password](#change_password)   


#### Method Description
<a name="change_password"></a>
##### Change Password

-  Request Parameters
    - Password 
    - New password

-  Action
    - Validates the current password against the `Rule class` [MatchCurrentPassword](/rules)
    - Updates the user's password with the hashed value of the new one provided.
