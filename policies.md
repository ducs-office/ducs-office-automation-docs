[Laravel Policy](https://laravel.com/docs/7.x/authorization#creating-policies)

This is a list of all the policies we have in the application. These policies authorize actions on the resource that they are defined on.
Apart from using custom logic based on the corresponding requirement the policies throughout the application also authorize the user against essential [permissions](insert_relative_link). 

The naming convention followed is like so: 
>If there exists an `IncomingLetterPolicy`, it authorizes actions on the `IncomingLetter` model.

### List of policies
1. [AttachmentPolicy](#attachment-policy)
2. [CollegePolicy](#college-policy)
2. [IncomingLetterPolicy](#incoming-letter-policy)


<a name="attachment-policy"></a>
`AttachmentPoliycy` : Authorizes if the user can view and delete the attachment. The authorization here follows on whether the user can  perform the same action on the resource that the attachment belongs to.

<a name="incoming-letter-policy"></a>
`IncomingLetterPolicy` : Authorizes CRUD operations on `IncomingLetter` based on if the user has the required permission.