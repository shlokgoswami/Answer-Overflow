# Answer Overflow

# Introduction
As we know, people often require help for different questions, and various platforms like Piazza, Stack Overflow, and Chegg have made it easier for them to get solutions to their problems. Therefore, the goal of this project is to build a web-based system for question-answering services like them.

This(below) is the first part of the project where we have developed a relational schema for the service that can store all the information about users and user profiles, questions, and answers. We have created several tables for our database system using PostgreSQL and Data grip, considering the requirement based on our design.

# Objectives
The purpose of this project is to construct a web-based answering user interface for the database that was designed in the first stage. Users can register, login, and read their profile information using our interface.

The project's main goal is to allow users to log in to their account and answer the questions posted by other students, and they can even post their own questions if they have any. Our system has a search mechanism that allows users to search from the Question or the Answer. We have also added a Voting system where users can vote when they like an answer. We also have the questions arranged in chronological order, so the questions that are posted recently will be on the top, and the ones that are posted after will be at the bottom.

Our objective as a whole is to provide a user experience where the person looking at the answer gets a brief idea about the quality of the answer based on the voting feedback provided by different users. This is a simple demonstration of a web answering system like Stack Overflow, Chegg, and Piazza, where we try to make as many features as possible available to the users.

# Database Design
This task will be accomplished using our relational structure, which comprises 4 relational tables. The following is the description of these tables:

Users: This table stores user information like userId, name, address, e-mail. The userid in this table is the primary key as it is unique for each user. In the second part, we would allow users to create the profile and sign in when they want a question or answer. Users also have been given rank based on votes they have received for answering questions.

Questions: This table stores questions asked by users, and each question has a unique questionid. The question has a title and body for further explanation, which would make it easier for searching relevant questions based on the weights, which we are considering providing in the second part of the project.

Answer: This table stores the answer for each question and also Userid for maintaining a record about who answered the question.

Vote: Whenever a user casts a vote, Aid and Uid are stored in the vote table, and whenever a user clicks on the vote again, it deletes the vote it cast earlier.

# Technologies Used
HTML
CSS
JavaScript
PHP
PostgreSQL
Features
User registration
User login
User profile
Posting questions
Answering questions
Voting system
Search functionality
SQL injection prevention
Chronological order of questions

# How to Run
Clone the repository to your local machine.
Open the index.html file in your browser to run the application.

# Conclusion
In conclusion, this project is the implementation of a web-based answering system that aims to provide a user-friendly interface for users to ask and answer questions. We have implemented several features that are similar to other platforms like Stack Overflow and Piazza.
