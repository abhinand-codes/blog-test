<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Getting Started with Laravel',
                'body'  => 'Laravel is a powerful PHP framework that makes web development enjoyable. It provides tools for routing, authentication, caching, and much more out of the box. Whether you are building a simple blog or a complex enterprise application, Laravel gives you a clean and expressive syntax to work with. In this article we explore the core concepts that every Laravel developer should know before diving into a real project.',
            ],
            [
                'title' => 'Understanding MVC Architecture',
                'body'  => 'MVC stands for Model View Controller and is one of the most widely used architectural patterns in web development. The Model handles data and business logic, the View is responsible for displaying information to the user, and the Controller acts as the bridge between the two. Understanding this separation of concerns is fundamental to writing maintainable and scalable applications in any framework.',
            ],
            [
                'title' => 'Why Clean Code Matters',
                'body'  => 'Writing clean code is not just about making your code look nice. It is about writing code that other developers can read, understand, and maintain without needing to ask you questions. Clean code reduces bugs, speeds up development over time, and makes onboarding new team members much easier. Simple naming conventions, small focused functions, and consistent formatting go a long way in any codebase.',
            ],
            [
                'title' => 'Building REST APIs in PHP',
                'body'  => 'REST APIs have become the standard way for applications to communicate with each other over the web. In PHP and specifically in Laravel, building a REST API involves defining routes, validating input, processing business logic, and returning consistent JSON responses. Using API Resources in Laravel allows you to format your responses cleanly and keep your controllers thin and focused.',
            ],
            [
                'title' => 'Database Design Best Practices',
                'body'  => 'A well designed database is the foundation of any reliable application. Choosing the right data types, normalizing your tables, defining proper foreign keys, and indexing frequently queried columns are all critical steps. Poor database design leads to slow queries, data inconsistencies, and painful migrations down the road. Always think ahead about how your data will grow and how it will be accessed.',
            ],
            [
                'title' => 'Introduction to Repository Pattern',
                'body'  => 'The Repository Pattern is a design pattern that abstracts the data layer from the rest of the application. Instead of writing database queries directly in your controllers or services, you delegate all data access to a repository class. This makes your code easier to test because you can swap out the real repository with a mock, and it keeps your business logic clean and independent of the underlying database technology.',
            ],
            [
                'title' => 'Service Layer in Laravel Explained',
                'body'  => 'The Service Layer sits between your Controllers and your Repositories. Its job is to contain all the business logic of your application. Controllers should only handle HTTP concerns like reading input and returning responses. Repositories should only handle database concerns. The Service Layer is where decisions are made, rules are enforced, and data is transformed before being passed back to the controller.',
            ],
        ];

        $comments = [
            [
                'level1' => ['author' => 'John',  'body' => 'Great article, very well explained!'],
                'level2' => ['author' => 'Sarah', 'body' => 'Totally agree with John, this helped me a lot.'],
                'level3' => ['author' => 'Mike',  'body' => 'Same here, bookmarked this for future reference.'],
            ],
            [
                'level1' => ['author' => 'Emma',  'body' => 'This is exactly what I was looking for, thank you.'],
                'level2' => ['author' => 'David', 'body' => 'Emma, glad you found it useful. I had the same question.'],
                'level3' => ['author' => 'Lisa',  'body' => 'I was confused about this topic for weeks, now it is clear.'],
            ],
            [
                'level1' => ['author' => 'Alex',  'body' => 'Really solid explanation. Clear and concise.'],
                'level2' => ['author' => 'Nina',  'body' => 'Alex, could you share any resources to read more on this?'],
                'level3' => ['author' => 'Alex',  'body' => 'Nina, I would recommend the official Laravel documentation first.'],
            ],
            [
                'level1' => ['author' => 'Tom',   'body' => 'I have been doing this wrong for years. Thanks for the correction.'],
                'level2' => ['author' => 'Grace', 'body' => 'Tom, same story here! Better late than never.'],
                'level3' => ['author' => 'Liam',  'body' => 'This comment thread is gold. Very helpful discussion.'],
            ],
            [
                'level1' => ['author' => 'Chris', 'body' => 'Would love to see a follow-up article on this topic.'],
                'level2' => ['author' => 'Anna',  'body' => 'Chris, I second that. Please write a part two!'],
                'level3' => ['author' => 'Ben',   'body' => 'Part two on advanced concepts would be amazing.'],
            ],
            [
                'level1' => ['author' => 'Zoe',   'body' => 'Shared this with my whole development team.'],
                'level2' => ['author' => 'Jack',  'body' => 'Zoe, our team needed this too. Very practical advice.'],
                'level3' => ['author' => 'Mia',   'body' => 'Jack, we implemented this pattern last week and it worked perfectly.'],
            ],
            [
                'level1' => ['author' => 'Ryan',  'body' => 'Simple, clear, and straight to the point. Well done.'],
                'level2' => ['author' => 'Lucy',  'body' => 'Ryan, exactly my thoughts. No fluff, just value.'],
                'level3' => ['author' => 'Owen',  'body' => 'Lucy, rare to find content this focused these days.'],
            ],
        ];

        foreach ($articles as $index => $articleData) {
            $article = Article::create($articleData);

            $commentSet = $comments[$index];

            // Level 1 comment
            $level1 = Comment::create([
                'article_id' => $article->id,
                'author'     => $commentSet['level1']['author'],
                'body'       => $commentSet['level1']['body'],
                'parent_id'  => null,
            ]);

            // Level 2 reply
            $level2 = Comment::create([
                'article_id' => $article->id,
                'author'     => $commentSet['level2']['author'],
                'body'       => $commentSet['level2']['body'],
                'parent_id'  => $level1->id,
            ]);

            // Level 3 reply
            Comment::create([
                'article_id' => $article->id,
                'author'     => $commentSet['level3']['author'],
                'body'       => $commentSet['level3']['body'],
                'parent_id'  => $level2->id,
            ]);
        }
    }
}