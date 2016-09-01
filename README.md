Problem fishing boat
================================================

A Symfony 3 project created on August 30, 2016, 8:26 pm.

================================================

The following problem should take approximately two hours to complete a working solution.  The submitted code should be of the quality we can expect during a normal working week.
The solution should be able to be installed and executed on a Linux platform, with PHP 5.5 and Apache. Additional components may be installable via composer. You are free to use any framework or external libraries. There is no requirement to cater for invalid input.  As you will not have the opportunity to clarify requirements, feel free to note any assumptions in your submission.
There are no tricks or gotchas: only implement the functionality described below.  It is a simple problem to solve, but code quality is as important as solving the problem itself.
Please return all files in a zip file for review. 

Problem fishing boat
I am about to buy a small fishing boat in order to escape work at the weekend and go fishing. I have not yet decided on what boat to buy or what engine I will need. Different boats have different power requirements and I’d like to have a web application that helps me chose the appropriate power requirements for the boats I am viewing.
Please implement a web application that allows me to enter the boat characteristics. The application should then display the power requirements (HP) that will be needed for a range of speeds starting from the theoretical hull speed up to 30 knots.
The application should be in 2 distinct parts. It should have browser based front end that accepts the boat’s characteristics and a backend that calculates the power requirements. 

The characteristics for my semi-displacement sports fisher are:
1.	Hull Length (HL)
2.	Buttock Angle in the range 2°-7°
3.	Displacement (Disp)

Because I am an old sea dog, I only understand; feet, lbs and knots and horses. However, you may convert units into metric if desired.

================================================

The following equations might help you:

HP = (Disp/1000) * [Kts / (Cw * HL^½)]^3

Cw = 0.8 + (0.17 * SL Ratio)

Hull speed (Kts) = SL Ratio * HL^½

SL Ratio = (Buttock Angle * -0.2) + 2.9

e.g. 
26’ boat with Buttock Angle = 2°

SL Ratio = (2 * -0.2) + 2.9 = 2.5

Hull Speed = 2.5 * √26  = 12.75 knots