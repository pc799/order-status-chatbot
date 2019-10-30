## Team No. 9 - Order Status Chat Bot


### Project Overview
----------------------------------

* What problem did the team try to solve?
    The problem given to us was to develop an Order Status Chat Bot for DELL Internal Agents. There is no single tool to suggest the status of Order Journey in real time. Disconnected Order Journey and multiple System provides various states in siloed way.

* What is the proposed solution?
    To deal with our Problem, we designed a DELL Agent Chat Box that can help a customer with his/her issues regarding his/her product delivery status like its estimated delivery time, current location of the product,etc


### Solution Description
----------------------------------
We have designed a Chat Bot named DELL Agent. It interacts with the customer and correctly identifies the issue/query of the customer. We have 4 systems namely: -
    1.	Customer
    2.	Order Status
    3.	Delivery Status
    4.	Support
These systems help in smooth transition of the user according to the request/query/issue.

#### Architecture Diagram



#### Technical Description
 * What technologies/versions were used
    1.	DialogFlow V2 API
    2.	Google Cloud Platform
    3.	MySQL Database Platform
    4.	HeroKu App Hosting
    5.	Php version 7.3.10
    6.	Bootstrap version 4.3.1


* Setup/Installations required to run the solution
    Working Internet Connection is required. Nothing else is required.

* Instructions to run the submitted code
    Deploy the back end code to using Heroku Git
    Download and install the Heroku CLI.
    If you haven't already, log in to your Heroku account and follow the prompts to create a new SSH public key.
    $ heroku login
    Clone the repository
    Use Git to clone dell-agent's source code to your local machine.
    $ heroku git:clone -a dell-agent
    $ cd dell-agent
    Deploy your changes
    Make some changes to the code you just cloned and deploy them to Heroku using Git.
    $ git add .
    $ git commit -am "make it better"
    $ git push heroku master
    Restore the dialogFlow.zip file into DialogFlow API.
    Add the heroku app URL as webhook to DialogFlow API.

### Team Members
----------------------------------

#Name	        Email ID	                  Contributions
Praveen Raj	praveenclaws7@outlook.com	  Full Stack Developer
Shubham Mittal	shubham_201700386@smit.smu.edu.in Database Management
Areen Sahu	areensahu1@gmail.com	          Project Management
