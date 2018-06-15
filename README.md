TASK MANAGEMENT LIST


An application that allows experienced users (Managers) to curate list of recurring tasks to be executed by individual (employees) 
contributors.

ENVIRONMENT

Windows, MySQL-databse, PHP-Backend.

HOW TO RUN:

1. Start Apache or Wamp server.
2. Copy these files into the project folder. Upload sample data using walmart-sql file provided.
3. Start the project at localhost/{Path-to-task_management}/login.php
4. Start by logging into an existing manager or register new user.

ASSUMPTIONS:
1. Recurring tasks are categorized into once, hourly and daily.
2. Daily tasks recur for a week, hourly tasks recur for a day.
3. Pending tasks are sorted according to priority: High, normal and low.

FUTURE IMPLEMENTATIONS:
1. Tasks can be created by individuals and provide feedbacks.
2. According to the updation of the time by individuals for each task, ranking can be calculated using the following ranking table

|Priority       |                	Task closest to finish time               |                	Task far to the finish time |
| --- | --- | --- |
| High |                                       1                                   |                    4    |
| Normal	|                                    2                              |                       	5 |
| Low |                                       3	                                     |                 6 |

Ranking of the displayed pending tasks will be according to the above priority against time i.e if the recurring pending task is 
closest to the complete time and has high priority then it will be listed first and so on.


  


