---
title: Attachment Controller
description: Attachment Controller responsible storeing, viewing and deleting atttachment files.
extends: _layouts.documentation
section: content
---


## AttachmentsController

#### Resource
[Attachment](models#attachment)

#### Brief 
Handles logic for CRUD operations on
attachments.

#### Policy
[AttachmentPolicy](policies#attachment-policy)

#### Methods
- [show](#show)  
- [destroy](#destory)   


#### Method Description
<a name="show"></a>
`show`

-  `Request Parameters`
    - attachment

-  `Actions`
    - shows the attached file in browser.

<a name="show"></a>
`destroy`

-  `Request Parameters`
    - attachment

-  `Actions`
    - deleted the attachment