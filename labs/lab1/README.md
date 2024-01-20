# waph-kanamala
# WAPH-Web Application Programming and Hacking

## Instructor: Dr. Phu Phung

## Student

**Name**: Lakshmi Narayana Kanamarlapudi

**Email**: kanamala@mail.uc.edu

**Short-bio**: I am having interest towards data science and web development. 

![Lakhmi Narayana headshot](Images/photo.jpg)

## Repository Information

Respository's URL: [https://github.com/LakshmiNarayanaKanamarlapudi/waph-kanamala.git](https://github.com/LakshmiNarayanaKanamarlapudi/waph-kanamala.git)

This is a private repository for Kanamarlapudi Lakshmi Narayana to store all code from the course. The organization of this repository is as follows.

### Labs 

[Hands-on exercises in lectures](labs) 

  - [https://github.com/LakshmiNarayanaKanamarlapudi/waph-kanamala/tree/main/labs/lab0](https://github.com/LakshmiNarayanaKanamarlapudi/waph-kanamala/tree/main/labs/lab0): Development Environment Setup 
  

### Lab 0

**Part 1** Ubuntu Virtual Machine & Software Installation <br>

- Open the sandbox enviroment using the specified link.
- Then login using the university credential.
- After that look the web app programming and hacking in the catalog
- Now request for the machine installation using request button and for the machine name we need to give the uc6+2-VM and submit the request. Then wait for the machine to be installed.
- After the intsallation process was completed check the ubuntu machine in the deployments section. 
- Finally we have our ubuntu machine was deployed and ready to use.
- Now click on the machine in deployments and select the machine with our username and drag drop down.
- From the dropdown click on connect to the remote console.
- Then give the username as administrator and password as Pa$$w0rd. Now we will be logged into the virtual Machine.
- Now open the terminal and install the net tools using the following command "sudo apt install net-tools".
- Then get the ip address of the machine using "ifconfig" command.
- Now intsall the apache webserver, Git and sublime text using the following commands "sudo apt install apache2", "sudo apt install git", "suso snap install sublime-text --classic".

<br>

![Apache Web Server Testing](Images/s1.png)

**Part 2** Git Repositories and Exercises <br>

- The course repository

![Course Repository](Images/s2.png)

- Private Repository
- One done with creating a github account.
- Create a private repository with the following naming convention is waph-uc(6+2).
- For that first open the github and login to your account.
- Then click on profile and navigate to the respositories and then create the private repository.
- And then from the collabirators section we need to add the professor to our repositiory.
- Private repository url : *(https://github.com/LakshmiNarayanaKanamarlapudi/waph-kanamala.git)*
- Then we need to generate the ssh key using the "ssh-keygen" command
- We need to go the ssh key location and copy the key.
- Now open the github click the profile icon and select the settings
- Then select SSh and GPG keys and add the new ssh key by pasting the key copied from vm.
- Now we need to clone our repository into our VM using the following command "git clone git@github.com:LakshmiNarayanaKanamarlapudi/waph-kanamala.git".
- Finally i have used the template in the course repository and edit the readme file in my repository.

**Screenshot of Changes from VM to Repository** <br>

![Changes from VM to repository!](Images/change.png)
