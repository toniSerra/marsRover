## Considerations

I've like the test, but for my style of programming I felt pressured "to finish". I would never deliver something with
this quality and call it "done".

Even with that, I'll be more than happy to answer any questions you might have about the architecture and how I would
completed the problem having more time.

Thanks for the opportunity.

### Approach

- Laravel project
- Core based on two classes: Board and Rover
- Rely on blade templates for display and perform user actions


## How to use

To run the application run:

    php artisan serve

In the broswer, open the localhost  ( http://localhost:8000 ) and you will see a board with some darker cells. Those are obstacles.
You can fill the form with the initial position and orientation of the MarsRover and the path it will have to follow:
The path must be a String concatenating the following orders ( no spaces or slashes allowed ):
    F -> Advance one position
    R -> Turn right and advance one position
    L -> Turn left and advance one position

Once you submit the form, it will show you the board with the rover's path.
If the Rover has faced one of the obstacles or the limits the board, it will have stoped before the colision leaving the path uncompleted.


## Feedback
I had fun coding this test, but there is som issues i'd like to improve.

I'm not proud of the result. Specially the frontend
With enough time, I'd have loved building a nuxt project far more interactive, and with enjoyable user experience.

I didn't have time enough to cover the testing part.
I tested manually most of the funcionality, but it's not enough to guarantee the correct performance of this app.

