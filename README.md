# Project 1 - Globitek CMS

Time spent: **11** hours spent in total

## User Stories

The following **required** functionality is completed:

- [ ] Create a Users Table
  - [ ] Define a table "users" for columns id, firstname, lastname, email, username, createdAt
- [ ] Create a Page with an HTML Form
  - [ ] with text inputs: first_name, last_name, email, username
  - [ ] submits to: itself ("public/register.php")
- [ ] Detect when the form is submitted
  - [ ] If "/public/register.php" is loaded directly, it should display the form.
  - [ ] If the form was submitted, it should retrieve the form data.
- [ ] Validate form data
  - [ ] Validate the presence of all form values.
  - [ ] Validate that no values are longer than 255 characters.
  - [ ] Validate that first_name and last_name have at least 2 characters.
  - [ ] Validate that username has at least 8 characters.
  - [ ] Validate that email contains a "@".
- [ ] Display form errors if any validations fail.
  - [ ] Do not submit the data to the database.
  - [ ] Redisplay the form with the submitted values filled in.
  - [ ] Report all errors as a list above the form.
- [ ] Submit successfully-validated form values to the database.
  - [ ] Write an SQL statement which will insert a new record into the globitek.users table using the submitted form values.
- [ ] Redirect the user to a confirmation page.
  - [ ] Redirect the user to the new page.
- [ ] Sanitize all dynamic output for HTML.
 

The following advanced user stories are optional:

- [ ] ...

## Video Walkthrough

Here's a walkthrough of implemented user stories:

<img src='http://i.imgur.com/link/to/your/gif/file.gif' title='Video Walkthrough' width='' alt='Video Walkthrough' />

GIF created with [LiceCap](http://www.cockos.com/licecap/).

## Notes

Describe any challenges encountered while building the app.

## License

    Copyright [yyyy] [name of copyright owner]

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

        http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.
