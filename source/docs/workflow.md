---
title: Workflow
description: Workflow of our project.
extends: _layouts.documentation
section: content
---

## Workflow


The project was floated as 'DUCS Office Automation'. Our very first task was to collect requirements from all the staff of the department. It can be found [here](https://docs.google.com/document/d/19WVERcSXfGOAeHzmA7XaEnDyD4RTVSH9ZN5EFK0kVwE/edit?usp=sharing) We chose to begin with the office's requirements since their work is majorly managed on paper and seemed a great start to help them shift to a paperless environment as much as we could. (The addition of scholars profile and the entire phd-scholar world was added at a later stage) 

The project is made using Laravel. From the get go, we follwed the TDD approach to develop the project which proves to be helpful during refactor or when we came back to some feature at a later stage, and used github to host the code respository. Initially we started by making a basic authentication for users. To start with, we created CRUD for letter logs. The user can create entries for letters sent and received, along with file uploads. The user can also leave remarks on an entry. This helped in eliminating verbal communication and confirmation on many trivial tasks. During this time we managed work division and management using [Trello](https://trello.com/).
Trello
Organize anything, together. Trello is a collaboration tool that organizes your projects into boards. In one glance, know what's being worked on, who's working on what, and where something is in a process.
This posed another challenge. Since the application was being made for the department, there was no clear division of responsibilities at the initial stage. We had to make sure that this division could be customised according to the needs of the department. At this point we turned to [Laravel permissions](https://docs.spatie.be/laravel-permission/v3/introduction/) to achieve what we needed. We created a static sets of permissions on any resource that we created. The user thus could be assigned aa set of permissions clubed under a role name. 

In addition to basic log maintenace and record-keeping the office also manages a sub-process of UG examinations which inludes collecting teaching-data from computer science teachers employed at the UG level. This data is then processed as required. This data collection process was being done by sending out e-forms. Our next task was to create a seperate authentication for those teachers, alienating them from the internal services provided by the application to the office and ability for the office to collect, aggregate and manage their teaching-data. Starting from here we resorted to using [Notion](https://www.notion.so/) to manage our work.
This also required for us to create CRUD operations for colleges that teach computer science under DU and the programmes, courses and their revision that they offer, since much of the data collected from the teachers revolves around this information.

The department offers PhD in computer science and has a significant number of doctoral students(called scholars). Our final task was to create within the app the provision for the office to register these students, and the students abeing able to manage their personnal, admission and academic details on their profile. Apart from these details, the schoalars must also be able to interact with their supervisor and advisors on taking permission for leaves and events such as seminar, title approval etc.

Till during a good extent of development, we used [Vuejs](https://vuejs.org/) for building user interfaces. We later removed Vue and used [Alpinejs](https://github.com/alpinejs/alpine) and [Laravel-Livewire](https://laravel-livewire.com/) to keep the syntax of the project Laravel & PHP specific throughout the application. Also, alpine works great for achieving reactivity with lesser the size against frameworks like Vue.
