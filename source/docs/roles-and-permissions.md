---
title: Roles & Permissions
description: Roles & Permissions used in the application.
extends: _layouts.documentation
section: content
---
## Roles & Permissions 


Since the application serves purpose for the DUCS office, there are tasks that overlap interaction and supervision from multiple people. As such, there's no clear divide of responsibility for all resources. 

Consider, an example of letter logs. While the office staff creates an entry for a letter, at times the responsibility of overlooking it lies with the intended recepient/sender. Remarks are exchanged in such cases. Moreover, nobody except the creator of the letter entry is allowed to delete or modify it.

This phenomenon is seen throughout most requirements of DUCS. 

To provide this flexibility in the application we have used a third party package [Larevel-Permission](https://docs.spatie.be/laravel-permission/v3/introduction/) by spatie.

The documentation's first line says 
> This package allows you to manage user permissions and roles in a database.

Roles here serve the purpose of grouping users into categories that define and limit their interaction with the application on multiple resources. This is controlled by giving a set of permissions to a role.

Most resources have CRUD permissions on them, and a few are based on DUCS' requirements. We were made aware of all actions on a resource/feature during the course of development. Therefore, we chose to create these permissions statically. Find the list [here](#list-of-permissions). When a new role is created, any subset from the list of permissions can be allowed on it, as defined by the use-case.

Now, a user can be given a role with the permission of creating letters named `office staff` and another user can be given a role with permission to view all letters and also leave remarks on them named `faculty`, thus, leaving customisation into the hands of the admin.

> CRUD on roles and permissions is also controlled by permissions.

Also, a user can also be assigned multiple roles.

This is used to verify and authorize users according to the access privileges
that have been granted to them by the use-case.

The defined permissions, with meanings evident from their names, provisioned in the
application are:
            
<a name="list-of-permissions">
<table>
  <tbody>
    <tr class="bg-gray-300 text-center h-16">
      <td>Roles</td>
      <td>Users</td>
      <td>Incoming Letters</td>
      <td>Outgoing Letters</td>
    </tr>
    <tr class="text-center">
      <td>
        <ul>
            <li> View </li>
            <li> Create </li>
            <li> Edit </li>
            <li> Delete </li>
        </ul>
      </td>
      <td>
        <ul>
            <li> View </li>
            <li> Create </li>
            <li> Edit </li>
            <li> Delete </li>
        </ul>
      </td>
      <td>
        <ul>
            <li> View </li>
            <li> Create </li>
            <li> Edit </li>
            <li> Delete </li>
        </ul>
      </td>
      <td>
        <ul>
            <li> View </li>
            <li> Create </li>
            <li> Edit </li>
            <li> Delete </li>
        </ul>
      </td>
    </tr>
    <tr class="bg-gray-300 text-center h-16">
      <td>Letter Reminders</td>
      <td>Remarks</td>
      <td>Colleges</td>
      <td>Programmes</td>
    </tr>
    <tr class="text-center">
      <td>
        <ul>
            <li> View </li>
            <li> Create </li>
            <li> Edit </li>
            <li> Delete </li>
        </ul>
      </td>
      <td>
        <ul>
            <li> View </li>
            <li> Create </li>
            <li> Edit </li>
            <li> Delete </li>
        </ul>
      </td>
      <td>
        <ul>
            <li> View </li>
            <li> Create </li>
            <li> Edit </li>
            <li> Delete </li>
        </ul>
      </td>
      <td>
        <ul>
            <li> View </li>
            <li> Create </li>
            <li> Edit </li>
            <li> Delete </li>
        </ul>
      </td>
    </tr>
    <tr class="bg-gray-300 text-center h-16">
      <td>Courses</td>
      <td>Leaves</td>
      <td>Phd Course Work</td>
      <td>Scholar Progress Reports</td>
    </tr>
    <tr class="text-center">
      <td>
          <ul>
              <li> View </li>
              <li> Create </li>
              <li> Edit </li>
              <li> Delete </li>
          </ul>
        </td>
      <td>
        <ul>
            <li> Respond </li>
        </ul>
      </td>
      <td>
        <ul>
            <li> Mark Completed </li>
            <li> View Marksheet </li>
        </ul>
      </td>
      <td>
        <ul>
            <li> Add </li>
            <li> View </li>
            <li> Delete </li>
        </ul>
      </td>
    </tr>
    <tr class="bg-gray-300 text-center h-16">
      <td>Scholar Documents</td>
      <td>Phd Seminar</td>
      <td>Title Approval</td>
      <td>Scholar Examiner</td>
    </tr>
    <tr class="text-center">
      <td>
        <ul>
            <li> Add </li>
            <li> View </li>
            <li> Delete </li>
        </ul>
      </td>
      <td>
        <ul>
            <li> Add Schedule </li>
            <li> Finalize </li>
        </ul>
      </td>
      <td>
        <ul>
            <li> Approve </li>
        </ul>
      </td>
      <td>
        <ul>
            <li> Recommend </li>
            <li> Approve </li>
        </ul>
      </td>
    </tr>
    <tr class="bg-gray-300 text-center h-16">
        <td>Teaching Records</td>
        <td>Scholar Mentors</td>
    </tr>
    <tr class="text-center">
      <td>
        <ul>
            <li> View </li>
            <li> Start </li>
            <li> Extend </li>
        </ul>
      </td>
        <td>
            <ul>
                <li> Replace </li>
            </ul>
        </td>
    </tr>
  </tbody>
</table>

            