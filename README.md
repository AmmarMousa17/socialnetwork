# socialnetwork
# In this project I will build my own version of social network
### Implementing some features and should apply SOLID principles and the design patterns 
These features are:
## Login
The user should be able to login to the website to use it. Each member should be able to login by a unique username and password. The login is mandatory to use the website if the user has no account, so the user should register firstly
## Register
The user should be able to register to the website. The website will ask the user for username, email, password, …, etc. after that the system will save user credential info so that the user can be able to login
## Send friend request 
The user should be able to send a friend request to any user in the website. If 2 users are friends so they can see the posts of each other. After the user send a friend request to another user to the other user should receive a notification for this friend request
## Show friend requests (Applying Observer design pattern)
The user should be able to list the received friend requests so that can be able to accept/ignore any friend request
## Accept friend request
The user should be able to accept any friend request. Just by showing the current friend request the user should be able to select some friend requests and accept them all.
## Write post
The user should be able to write a post on his/her own timeline. The post should be consisted of some text. Also the user should be able to add some emotions in the post. After the user posted a post, this post should be visible in his/her friends timeline
## Like post
The user should be able to like any post in the website. If the user hits a like in a post so the system will count a like for this post. The user only hits like for any post one time.
## Show timeline
The user should be able to show his/her timeline. The timeline consisted of some posts. These posts are mainly the user posts and the user friends’ posts
## Sort timeline (Applying strategy design pattern)
The user should be able to sort the timeline according to some criteria. For now the user should be only able to sort the posts according to the dates (the most recent posts should appear firstly) or the most liked posts appear firstly. But the sorting way may differ in the future and some sorting ways added in the future
