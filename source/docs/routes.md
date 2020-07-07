---
title: Application Routes
description: all the registered routes in the application.
extends: _layouts.documentation
section: content
---

This is the list of all routes we have on the application. 

> **Note**: These routes are subject to change.

All the controllers are relative to the namespace `App\Http\Controllers`.
# List of Route Groups
- [List of Route Groups](#list-of-route-groups)
  - [Staff Routes](#staff-routes)
  - [Research Routes](#research-routes)
  - [Scholar Routes](#scholar-routes)
  - [Other Routes](#other-routes)

## Staff Routes
| Method         | URI                                                      | Action                                          |
| -------------- | -------------------------------------------------------- | ----------------------------------------------- |
| `GET` / `HEAD` | `staff`                                                  | `Closure`                                       |
| `POST`         | `staff/account/change_password`                          | `Staff\AccountController@change_password`       |
| `DELETE`       | `staff/attachments/{attachment}`                         | `Staff\AttachmentController@destroy`            |
| `GET` / `HEAD` | `staff/attachments/{attachment}`                         | `Staff\AttachmentController@show`               |
| `POST`         | `staff/colleges`                                         | `Staff\CollegeController@store`                 |
| `GET` / `HEAD` | `staff/colleges`                                         | `Staff\CollegeController@index`                 |
| `GET` / `HEAD` | `staff/colleges/create`                                  | `Staff\CollegeController@create`                |
| `DELETE`       | `staff/colleges/{college}`                               | `Staff\CollegeController@destroy`               |
| `PATCH`        | `staff/colleges/{college}`                               | `Staff\CollegeController@update`                |
| `GET` / `HEAD` | `staff/colleges/{college}/edit`                          | `Staff\CollegeController@edit`                  |
| `POST`         | `staff/cosupervisors`                                    | `Staff\CosupervisorController@store`            |
| `GET` / `HEAD` | `staff/cosupervisors`                                    | `Staff\CosupervisorController@index`            |
| `PATCH`        | `staff/cosupervisors/{cosupervisor}`                     | `Staff\CosupervisorController@update`           |
| `DELETE`       | `staff/cosupervisors/{cosupervisor}`                     | `Staff\CosupervisorController@destroy`          |
| `POST`         | `staff/courses`                                          | `Staff\CourseController@store`                  |
| `GET` / `HEAD` | `staff/courses`                                          | `Staff\CourseController@index`                  |
| `DELETE`       | `staff/courses/{course}`                                 | `Staff\CourseController@destroy`                |
| `PATCH`        | `staff/courses/{course}`                                 | `Staff\CourseController@update`                 |
| `POST`         | `staff/courses/{course}/revisions`                       | `Staff\CourseRevisionController@store`          |
| `DELETE`       | `staff/courses/{course}/revisions/{revision}`            | `Staff\CourseRevisionController@destroy`        |
| `GET` / `HEAD` | `staff/incoming-letters`                                 | `Staff\IncomingLettersController@index`         |
| `POST`         | `staff/incoming-letters`                                 | `Staff\IncomingLettersController@store`         |
| `GET` / `HEAD` | `staff/incoming-letters/create`                          | `Staff\IncomingLettersController@create`        |
| `DELETE`       | `staff/incoming-letters/{letter}`                        | `Staff\IncomingLettersController@destroy`       |
| `PATCH`        | `staff/incoming-letters/{letter}`                        | `Staff\IncomingLettersController@update`        |
| `GET` / `HEAD` | `staff/incoming-letters/{letter}/edit`                   | `Staff\IncomingLettersController@edit`          |
| `POST`         | `staff/incoming-letters/{letter}/remarks`                | `Staff\IncomingLettersController@storeRemark`   |
| `GET` / `HEAD` | `staff/outgoing-letters`                                 | `Staff\OutgoingLettersController@index`         |
| `POST`         | `staff/outgoing-letters`                                 | `Staff\OutgoingLettersController@store`         |
| `GET` / `HEAD` | `staff/outgoing-letters/create`                          | `Staff\OutgoingLettersController@create`        |
| `PATCH`        | `staff/outgoing-letters/{letter}`                        | `Staff\OutgoingLettersController@update`        |
| `DELETE`       | `staff/outgoing-letters/{letter}`                        | `Staff\OutgoingLettersController@destroy`       |
| `GET` / `HEAD` | `staff/outgoing-letters/{letter}/edit`                   | `Staff\OutgoingLettersController@edit`          |
| `POST`         | `staff/outgoing-letters/{letter}/remarks`                | `Staff\OutgoingLettersController@storeRemark`   |
| `POST`         | `staff/outgoing_letters/{letter}/reminders`              | `Staff\OutgoingLetterRemindersController@store` |
| `POST`         | `staff/phd-courses`                                      | `Staff\PhdCourseController@store`               |
| `GET` / `HEAD` | `staff/phd-courses`                                      | `Staff\PhdCourseController@index`               |
| `DELETE`       | `staff/phd-courses/{course}`                             | `Staff\PhdCourseController@destroy`             |
| `PATCH`        | `staff/phd-courses/{course}`                             | `Staff\PhdCourseController@update`              |
| `GET` / `HEAD` | `staff/programme/{programme}/revisions`                  | `Staff\ProgrammeRevisionController@index`       |
| `DELETE`       | `staff/programme/{programme}/revisions/{revision}`       | `Staff\ProgrammeRevisionController@destroy`     |
| `POST`         | `staff/programmes`                                       | `Staff\ProgrammesController@store`              |
| `GET` / `HEAD` | `staff/programmes`                                       | `Staff\ProgrammesController@index`              |
| `GET` / `HEAD` | `staff/programmes/create`                                | `Staff\ProgrammesController@create`             |
| `DELETE`       | `staff/programmes/{programme}`                           | `Staff\ProgrammesController@destroy`            |
| `PATCH`        | `staff/programmes/{programme}`                           | `Staff\ProgrammesController@update`             |
| `GET` / `HEAD` | `staff/programmes/{programme}/edit`                      | `Staff\ProgrammesController@edit`               |
| `POST`         | `staff/programmes/{programme}/revisions`                 | `Staff\ProgrammeRevisionController@store`       |
| `GET` / `HEAD` | `staff/programmes/{programme}/revisions/create`          | `Staff\ProgrammeRevisionController@create`      |
| `PATCH`        | `staff/programmes/{programme}/revisions/{revision}`      | `Staff\ProgrammeRevisionController@update`      |
| `GET` / `HEAD` | `staff/programmes/{programme}/revisions/{revision}/edit` | `Staff\ProgrammeRevisionController@edit`        |
| `PATCH`        | `staff/remarks/{remark}`                                 | `Staff\RemarksController@update`                |
| `DELETE`       | `staff/remarks/{remark}`                                 | `Staff\RemarksController@destroy`               |
| `PATCH`        | `staff/reminders/{reminder}`                             | `Staff\RemindersController@update`              |
| `DELETE`       | `staff/reminders/{reminder}`                             | `Staff\RemindersController@destroy`             |
| `GET` / `HEAD` | `staff/roles`                                            | `Staff\RoleController@index`                    |
| `POST`         | `staff/roles`                                            | `Staff\RoleController@store`                    |
| `PATCH`        | `staff/roles/{role}`                                     | `Staff\RoleController@update`                   |
| `DELETE`       | `staff/roles/{role}`                                     | `Staff\RoleController@destroy`                  |
| `GET` / `HEAD` | `staff/scholars`                                         | `Staff\ScholarController@index`                 |
| `POST`         | `staff/scholars`                                         | `Staff\ScholarController@store`                 |
| `PATCH`        | `staff/scholars/{scholar}`                               | `Staff\ScholarController@update`                |
| `DELETE`       | `staff/scholars/{scholar}`                               | `Staff\ScholarController@destroy`               |
| `GET` / `HEAD` | `staff/scholars/{scholar}/avatar`                        | `Staff\ScholarController@avatar`                |
| `PATCH`        | `staff/scholars/{scholar}/replace-cosupervisor`          | `Staff\ScholarController@replaceCosupervisor`   |
| `PATCH`        | `staff/scholars/{scholar}/replace-supervisor`            | `Staff\ScholarController@replaceSupervisor`     |
| `POST`         | `staff/users`                                            | `Staff\UserController@store`                    |
| `GET` / `HEAD` | `staff/users`                                            | `Staff\UserController@index`                    |
| `PATCH`        | `staff/users/{user}`                                     | `Staff\UserController@update`                   |
| `DELETE`       | `staff/users/{user}`                                     | `Staff\UserController@destroy`                  |


## Research Routes
| Method         | URI                                                                 | Action                                                        |
| -------------- | ------------------------------------------------------------------- | ------------------------------------------------------------- |
| `GET` / `HEAD` | `research/advisory-meetings/{meeting}/minutes-of-meeting`           | `Research\ScholarAdvisoryMeetingsController@minutesOfMeeting` |
| `GET` / `HEAD` | `research/publications`                                             | `Research\ShowPublications`                                   |
| `GET` / `HEAD` | `research/scholars`                                                 | `Research\ScholarController@index`                            |
| `GET` / `HEAD` | `research/scholars/{scholar}`                                       | `Research\ScholarController@show`                             |
| `PATCH`        | `research/scholars/{scholar}/advisors`                              | `Research\ScholarController@updateAdvisors`                   |
| `POST`         | `research/scholars/{scholar}/advisory-meetings`                     | `Research\ScholarAdvisoryMeetingsController@store`            |
| `POST`         | `research/scholars/{scholar}/coursework`                            | `Research\ScholarCourseworkController@store`                  |
| `PATCH`        | `research/scholars/{scholar}/coursework/{courseId}`                 | `Research\ScholarCourseworkController@complete`               |
| `GET` / `HEAD` | `research/scholars/{scholar}/courseworks/{course}/marksheet`        | `Research\ScholarCourseworkController@viewMarksheet`          |
| `POST`         | `research/scholars/{scholar}/document`                              | `Research\ScholarOtherDocumentsController@store`              |
| `GET` / `HEAD` | `research/scholars/{scholar}/document/{document}/attachment`        | `Research\ScholarOtherDocumentsController@viewAttachment`     |
| `GET` / `HEAD` | `research/scholars/{scholar}/leaves/{leave}/application`            | `Research\ScholarLeavesController@viewApplication`            |
| `PATCH`        | `research/scholars/{scholar}/leaves/{leave}/recommend`              | `Research\ScholarLeavesController@recommend`                  |
| `PATCH`        | `research/scholars/{scholar}/leaves/{leave}/respond`                | `Research\ScholarLeavesController@respond`                    |
| `GET` / `HEAD` | `research/scholars/{scholar}/leaves/{leave}/response-letter`        | `Research\ScholarLeavesController@viewResponseLetter`         |
| `POST`         | `research/scholars/{scholar}/progress-report`                       | `Research\ScholarProgressReportsController@store`             |
| `GET` / `HEAD` | `research/scholars/{scholar}/progress-report/{document}/attachment` | `Research\ScholarProgressReportsController@viewAttachment`    |
| `PATCH`        | `research/scholars/{scholar}/replace-advisory-committee`            | `Research\ScholarController@replaceAdvisors`                  |

## Scholar Routes
| Method         | URI                                                       | Action    `                                            |
| -------------- | --------------------------------------------------------- | ------------------------------------------------------ |
| `GET` / `HEAD` | `scholars`                                                | `Scholars\DashboardController@index`                   |
| `GET` / `HEAD` | `scholars/advisory-meetings/{meeting}/minutes-of-meeting` | `Scholars\AdvisoryMeetingsController@minutesOfMeeting` |
| `GET` / `HEAD` | `scholars/courseworks/{course}/marksheet`                 | `Scholars\CourseworkController@viewMarksheet`          |
| `GET` / `HEAD` | `scholars/document/{document}/attachment`                 | `Scholars\OtherDocumentsController`                    |
| `POST`         | `scholars/leaves`                                         | `Scholars\LeavesController@store`                      |
| `GET` / `HEAD` | `scholars/leaves/{leave}/application`                     | `Scholars\LeavesController@viewApplication`            |
| `GET` / `HEAD` | `scholars/leaves/{leave}/response-letter`                 | `Scholars\LeavesController@viewResponseLetter`         |
| `GET` / `HEAD` | `scholars/presentation`                                   | `Scholars\PresentationController@create`               |
| `POST`         | `scholars/presentation`                                   | `Scholars\PresentationController@store`                |
| `PATCH`        | `scholars/presentation/{presentation}`                    | `Scholars\PresentationController@update`               |
| `DELETE`       | `scholars/presentation/{presentation}`                    | `Scholars\PresentationController@destroy`              |
| `GET` / `HEAD` | `scholars/presentation/{presentation}/edit`               | `Scholars\PresentationController@edit`                 |
| `PATCH`        | `scholars/profile`                                        | `Scholars\ProfileController@update`                    |
| `GET` / `HEAD` | `scholars/profile`                                        | `Scholars\ProfileController@index`                     |
| `GET` / `HEAD` | `scholars/profile/avatar`                                 | `Scholars\ProfileController@avatar`                    |
| `GET` / `HEAD` | `scholars/profile/edit`                                   | `Scholars\ProfileController@edit`                      |
| `GET` / `HEAD` | `scholars/progress-reports/{document}/attachment`         | `Scholars\ProgressReportsController`                   |




## Other Routes
| Method         | URI                                                   | Action                                                 |
| -------------- | ----------------------------------------------------- | ------------------------------------------------------ |
| `GET` / `HEAD` | `/`                                                   | `Auth\LoginController@showLoginForm`                   |
| `GET` / `HEAD` | `api/courses`                                         | `Api\CoursesController@index`                          |
| `GET` / `HEAD` | `api/courses/{course}`                                | `Api\CoursesController@show`                           |
| `GET` / `HEAD` | `api/programme-revisions/{programmeRevision}/courses` | `Api\ProgrammeRevisionCourseController@index`          |
| `GET` / `HEAD` | `api/users`                                           | `Api\UsersController@index`                            |
| `GET` / `HEAD` | `api/users/{user}`                                    | `Api\UsersController@show`                             |
| `POST`         | `external-authorities`                                | `ExternalAuthorityController@store`                    |
| `GET` / `HEAD` | `external-authorities`                                | `ExternalAuthorityController@index`                    |
| `PATCH`        | `external-authorities/{externalAuthority}`            | `ExternalAuthorityController@update`                   |
| `POST`         | `login`                                               | `Auth\LoginController@login`                           |
| `POST`         | `logout`                                              | `Auth\LoginController@logout`                          |
| `GET` / `HEAD` | `publications/conference`                             | `Publications\ConferencePublicationController@create`  |
| `DELETE`       | `publications/conference/{conference}`                | `Publications\ConferencePublicationController@destroy` |
| `PATCH`        | `publications/conference/{conference}`                | `Publications\ConferencePublicationController@update`  |
| `GET` / `HEAD` | `publications/conference/{conference}/edit`           | `Publications\ConferencePublicationController@edit`    |
| `POST`         | `publications/journal`                                | `Publications\JournalPublicationController@store`      |
| `GET` / `HEAD` | `publications/journal`                                | `Publications\JournalPublicationController@create`     |
| `PATCH`        | `publications/journal/{journal}`                      | `Publications\JournalPublicationController@update`     |
| `DELETE`       | `publications/journal/{journal}`                      | `Publications\JournalPublicationController@destroy`    |
| `GET` / `HEAD` | `publications/journal/{journal}/edit`                 | `Publications\JournalPublicationController@edit`       |
| `POST`         | `publications/publications/conference`                | `Publications\ConferencePublicationController@store`   |
| `POST`         | `teaching-details/send`                               | `TeachingRecordsController@store`                      |
| `GET` / `HEAD` | `teaching-records`                                    | `TeachingRecordsController@index`                      |
| `GET` / `HEAD` | `teaching-records/export`                             | `TeachingRecordsController@export`                     |
| `PATCH`        | `teaching-records/extend`                             | `TeachingRecordsController@extend`                     |
| `POST`         | `teaching-records/start`                              | `TeachingRecordsController@start`                      |
| `PATCH`        | `users/@{user}`                                       | `UserProfileController@update`                         |
| `GET` / `HEAD` | `users/@{user}`                                       | `UserProfileController@show`                           |
| `GET` / `HEAD` | `users/@{user}/avatar`                                | `UserProfileController@avatar`                         |


