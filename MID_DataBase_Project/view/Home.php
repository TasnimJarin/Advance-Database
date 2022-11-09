<html>
     <head>
          <title>Home</title>
          <link rel="stylesheet" type="text/css" href="Home.css">
     </head>

     <body>
       
       
       <form>
                <div id="d1">
                  <img src="../../assets/Admin/newwb_back.jpg" class="c1"  >
                </div>
                <div id="db">
                <div id ="d6"><img class="c9" src="../../assets/Admin/logo.jfif" height ="130px" width="120px"></div>
                <div id="d2">
       
                <div id ="d9"><h1 style="font-size:3.5vw"> University Portal</h1></div>
                    
                    <div id="d3">
                       <h3> <b>Welcome <?php echo $_COOKIE['loggedInName'] ?></b> |
                        <b><a href="Home.php">Home</a></b> |
                        <b><a href="showPro.php">Show Profile</a></b> |
                        
                        <b><a href="../../controller/Admin/logout.php">LogOut</a></b></h3> 
                     </div>
               </div>

                     <div id="d4">
                    

     
                            <h2 style="font-size:2vw"><a href="Add_TSP.php" ><li> Add Student/Parent/Teacher</a></li> <br/>
                            <a href="showListTSP.php"><li> Show List of Student/Parent/Teacher</li></a><br/>
                            <a href="TeacherSchedule.php"><li> Teacher Schedule</li></a><br/>
                            <a href="studentSchedule.php"><li>Student Schedule</li></a><br/>
                            <a href="StudentCGPA.php"><li>Control students CGPA</li></h2> <br/> 
                    </div>
           
                     <div id="d5">
                          <h2 style="font-size:2vw"> <a href="AdmissionInfo.php"><li>Add admission info</li></a> <br/>               
                          <a href="NoticeAdd.php"><li>Add Notice</li></a><br/>
                          <a href="CheckApplication.php"><li> Check Application</li></a><br/>
                           <a href="academicCalender.php"><li> Academic Calendar</li></a></h2> <br/>

                     </div>


          
               </div>
                            
         

                  
    </form>

     </body>




</html>

