# Washington Ferry Ticket Reservation
![alt text](images/start.PNG)

Above is the starting page of the app.

This application is for reserving a vehicle spot on a Washington State Ferry. I made the app with HTML, CSS, JavaScript and PHP.

Below are the options for destinations. The arrival dropdown options exclude the option that was chosen by the user for departure.

![alt text](images/arrival_options.png)


I used JavaScript to make changes to the web page (without reloading) based on the user's selections, like with the arrival/departure options. 

When choosing Vehicle length, the user has 3 options. The form items in the area below will change based on what the user selects. For example, if the user selects "22 feet and over", a new box will appear asking for the length in feet - as shown below.

![alt text](images/over22.PNG)

If the user selects motorcycle, 2 new checkboxes will appear asking the user some additional questions - see below.

![alt text](images/motorcycle.PNG)

This was what I used JavaScript for.

Finally, after clicking on "Reserve Spot", if you have entered all of the information, you will be brought to a confirmation page. The information entered on the previous webpage is retrieved, using PHP, via an HTTP GET request.

![alt text](images/confirmation.PNG)

