app.controller('alertCtrl', function ($scope) {});
app.controller('signCtrl', function ($scope) {});
app.controller('alertCtrlForget', function ($scope) {});
app.controller('alertCtrlVerify', function ($scope) {});
app.controller('regCtrl', function ($scope) {});
app.controller('contactCtrl', function ($scope) {});


app.controller('ShowUserCtrl', function($scope, $routeParams) {
$scope.userid = $routeParams.UserID;
assigner();
});



app.controller('authCtrl', function ($scope, $rootScope, $routeParams, $location, $http, Data) {
    $scope.data = {show: false};
    
    
    console.log('tet');
    $scope.doReg = {firstname: '', email: '', password: ''};
    $scope.doReg = function ()
    {
        firstname = $scope.signup.firstname;
        email = $scope.signup.email;
        password = $scope.signup.password;
        $scope.data.show = false;
        $scope.data.show = true
        var quickbloxapitoken = localStorage.getItem('quickbloxapitoken');
        $http.post('http://api.quickblox.com/users.json', {
            token: quickbloxapitoken,
            user: {
                full_name: firstname,
                email: email,
                login: email,
                password: password
            }
        }, {
            'Content-Type': 'application/x-www-form-urlencoded'
        })

                .then(function (results)
                {
                    var apiid = results.data.user.id;
                    console.log(apiid);

                    $http.post('RegisterUser', {firstname: firstname, email: email, password: password, quickblox_id: apiid}).then(function (results)
                    {
                            
                        if (results.data == 'success')
                        {
                            
                            console.log('Register Success');
                            $location.path('registersuccess');
                        }
                        else
                        {
                            console.log('error5');
                        }
                    });



                })
                .catch(function (response)
                {
                    console.log(response.data.errors.email);
                    var email = response.data.errors.email;
                    console.log('outputing');
                    $scope.data.msg = 'Error : Email ' + email;

                });







    };


    $scope.doVerify = {email: '', password: ''};
    $scope.doVerify = function ()
    {
        email = $scope.verify.useremail;
        password = $scope.verify.password;
        $scope.data.show = false;
        $http.post('VerifyUser', {email: email, password: password}).then(function (results)
        {
            $scope.data.show = true
            if (results.data == 'success')
            {
                console.log('Verification Success');
                $location.path('registration');
            }
            else
            {
                $scope.data.msg = 'Incorrect Password'
                console.log('error4');
            }
        });
    };

    $scope.doForget = {email: ''};
    $scope.doForget = function ()
    {
        email = $scope.forget.email;
        $scope.data.show = false;
        $http.post('ResetPassword', {email: email}).then(function (results)
        {
            $scope.data.show = true
            if (results.data == 'success')
            {
                $location.path('login');
            }
            else
            {
                $scope.data.msg = 'Invalid Email'
                console.log('error');
            }
        });
    };


    $scope.doCompleteRegister = {day: '', month: '', year: '', code: '', phone: '', city: '', sex: '', interest: '', seeking: '', useremail: ''};
    $scope.doCompleteRegister = function ()
    {

        useremail = $scope.register.useremail;
        day = $scope.register.day;
        month = $scope.register.month;
        year = $scope.register.year;
        code = $scope.register.code;
        phone = $scope.register.phone;
        city = $scope.register.city;
        sex = $scope.register.sex;

        interest = $scope.register.interest;
        seeking = $scope.register.seeking;
        dob = year + '-' + month + '-' + day;


        $http.post('CompleteRegistration', {useremail: useremail, dob: dob, phone_code: code, phone_number: phone, city: city, gender: sex, interest: interest, seeking: seeking}).then(function (results)
        {
            console.log(results.data);
            if (results.data == 'success')
            {
                $location.path('dashboard');
            }
            else
            {
                console.log('error2');
            }
        });
    };



    $scope.doLog = function ()
    {
        email = $scope.login.email;
        password = $scope.login.password;
        $scope.data.show = false; //making it false
        $http.post('authenticateUser', {email: email, password: password}).then(function (results)
        {
            console.log(email);
            //return false;
            $scope.data.show = true
            if (results.data == 'success')
            {
                $location.path('dashboard');
                //$scope.data.msg = 'Successfully triggered'
            }
            else if (results.data == 'notactive')
            {
                $scope.data.msg = 'Account not Activated'
            }
            else
            {
                $scope.data.msg = 'Invalid Username or Password'
            }
        });
    };

    $scope.logout = function () {
        
        

        $http.post('Logout', {}).then(function (results)
        {
            if (results.data == 'success')
            {
                //$location.path('login');
                //$location.reload();

                window.location.assign("#/login")


            }
            else
            {
                console.log('error1');
            }
        });

    }




    $scope.login = {};
    $scope.signup = {};
    $scope.doLogin = function (customer) {
        Data.post('login', {
            customer: customer
        }).then(function (results) {
            Data.toast(results);
            if (results.status == "success") {
                $location.path('dashboard');
            }
        });
    };





    $scope.signup = {email: '', password: '', name: '', phone: '', address: ''};
    $scope.signUp = function (customer) {
        Data.post('signUp', {
            customer: customer
        }).then(function (results) {
            Data.toast(results);
            if (results.status == "success") {
                $location.path('dashboard');
            }
        });
    };


    $scope.forget = {email: ''};
    $scope.forget = function () {
        console.log('ffd');
        Data.get('forget').then(function (results)
        {
            console.log('aaaaaaaa');
            return false;
            console.log('bbbbbbb');
        });
    }

    ////// Profile Details ///////
    
    /* Used to Update the ProfileName of the User */
    
    $scope.updateProfileName = function ()
    {
        userProfileName = $scope.userProfileName;
        $http.post('updateProfileName', {userProfileName: userProfileName}).then(function (results)
        {
            if (results.data == 'update_success')
            {
                console.log('success');
                var updatedata = angular.element( document.querySelector('#renderProfileName_val'));
                updatedata.text(userProfileName);
            }
            else
            {
                console.log('error');
            }
        });
    };

/* Used to Update the AboutMe of the User */

    $scope.updateAboutMe = function ()
    {
        userAboutMe = $scope.userAboutMe;
        $http.post('updateAboutMe', {userAboutMe: userAboutMe}).then(function (results)
        {
            if (results.data == 'update_success')
            {
                console.log('success');
                var updatedata = angular.element( document.querySelector('.renderAboutMe_val'));
                updatedata.text(userAboutMe);
                
            }
            else
            {
                console.log('error');
            }
        });
    };

    /* Used to Update the Relationship of the User */

    $scope.updateRelationship = function ()
    {
        userRelationship = $scope.userRelationship;
        $http.post('updateRelationship', {userRelationship: userRelationship}).then(function (results)
        {
            if (results.data == 'update_success')
            {
                console.log('success');
                if(userRelationship=='0')
                {
                    var data = 'No Answer';
                }
                else if(userRelationship=='1')
                {
                    var data = 'Single';
                }
                else if(userRelationship=='2')
                {
                    var data = 'Taken';
                }
                else if(userRelationship=='3')
                {
                    var data = 'Open';
                }
                else
                {
                    var data = '';
                }
                var updatedata = angular.element( document.querySelector('.renderRelationship_val'));
                updatedata.text(data);
                
            }
            else
            {
                console.log('error');
            }
        });
    };

    /* Used to Update the Sexuality of the User */

$scope.updateSexuality = function ()
    {
        userSexuality = $scope.userSexuality;
        $http.post('updateSexuality', {userSexuality: userSexuality}).then(function (results)
        {
            if (results.data == 'update_success')
            {
                console.log('success');
                if(userSexuality == '0')
                {
                    var data = 'No Answer';
                }
                else if(userSexuality == '1')
                {
                    var data = 'Straight';
                }
                else if(userSexuality == '2')
                {
                    var data = 'Open-minded';
                }
                else if(userSexuality=='3')
                {
                    var data = 'Bisexual';
                }
                else if(userSexuality=='4')
                {
                    var data = 'Gay';
                }
                else
                {
                    var data = '';
                }
                
                var updatedata = angular.element( document.querySelector('.renderSexuality_val'));
                updatedata.text(data);
            }
            else
            {
                console.log('error');
            }
        });
    };

    /* Used to Update the Height of the User */

$scope.updateHeight = function ()
    {
        userHeight = $scope.userHeight;
        $http.post('updateHeight', {userHeight: userHeight}).then(function (results)
        {
            if (results.data == 'update_success')
            {
                console.log('success');
                if(userHeight=='1')
                {
                    var data = 'No Answer';
                }
                else
                {
                    var data = userHeight+' Cm';
                }
                var updatedata = angular.element( document.querySelector('.renderHeight_val'));
                updatedata.text(data);
                
            }
            else
            {
                console.log('error');
            }
        });
    };
    
    
     /* Used to Update the Weight of the User */

$scope.updateWeight = function ()
    {
        userWeight = $scope.userWeight;
        $http.post('updateWeight', {userWeight: userWeight}).then(function (results)
        {
            if (results.data == 'update_success')
            {
                console.log('success');
                if(userWeight=='1')
                {
                    var data = 'No Answer';
                }
                else
                {
                    var data = userWeight+' Kg';
                }
                var updatedata = angular.element( document.querySelector('.renderWeight_val'));
                updatedata.text(data);
            }
            else
            {
                console.log('error');
            }
        });
    };
    
     /* Used to Update the Weight of the User */

$scope.updateBody = function ()
    {
        userBody = $scope.userBody;
        $http.post('updateBody', {userBody: userBody}).then(function (results)
        {
            if (results.data == 'update_success')
            {
                console.log('success');
                
                
                if(userBody == '0')
                {
                    var data = 'No Answer';
                }
                else if(userBody == '1')
                {
                    var data = 'Slim';
                }
                else if(userBody == '2')
                {
                    var data = 'Normal';
                }
                else if(userBody=='3')
                {
                    var data = 'Fat';
                }
                else if(userBody=='4')
                {
                    var data = 'Very Fat';
                }
                else
                {
                    var data = 'No Answer';
                }
                
                var updatedata = angular.element( document.querySelector('.renderBody_val'));
                updatedata.text(data);
                
                
            }
            else
            {
                console.log('error');
            }
        });
    };

     /* Used to Update the Children of the User */

$scope.updateChildren = function ()
    {
        userChildren = $scope.userChildren;
        $http.post('updateChildren', {userChildren: userChildren}).then(function (results)
        {
            if (results.data == 'update_success')
            {
                console.log('success');
                
                if(userChildren == '0')
                {
                    var data = 'No Answer';
                }
                else if(userChildren == '1')
                {
                    var data = 'No, Answer';
                }
                else if(userChildren == '2')
                {
                    var data = 'Someday';
                }
                else if(userChildren=='3')
                {
                    var data = 'Already have';
                }
                else if(userChildren=='4')
                {
                    var data = 'Empty nest';
                }
                else
                {
                    var data = 'No Answer';
                }
                
                var updatedata = angular.element( document.querySelector('.renderChildren_val'));
                updatedata.text(data);
                
            }
            else
            {
                console.log('error');
            }
        });
    };
    
    
    /* Used to Update the Smoking of the User */

$scope.updateSmoking = function ()
    {
        userSmoking = $scope.userSmoking;
        $http.post('updateSmoking', {userSmoking: userSmoking}).then(function (results)
        {
            if (results.data == 'update_success')
            {
                console.log('success');
                if(userSmoking == '0')
                {
                    var data = 'No Answer';
                }
                else if(userSmoking == '1')
                {
                    var data = 'Yes';
                }
                else if(userSmoking == '2')
                {
                    var data = 'No';
                }
                else
                {
                    var data = 'No Answer';
                }
                
                var updatedata = angular.element( document.querySelector('.renderSmoking_val'));
                updatedata.text(data);
                
            }
            else
            {
                console.log('error');
            }
        });
    };

   /* Used to Update the Drinking of the User */

$scope.updateDrinking = function ()
    {
        console.log('dr');
        userDrinking = $scope.userDrinking;
        $http.post('updateDrinking', {userDrinking: userDrinking}).then(function (results)
        {
            if (results.data == 'update_success')
            {
                console.log('success');
                
                if(userDrinking == '0')
                {
                    var data = 'No Answer';
                }
                else if(userDrinking == '1')
                {
                    var data = 'No';
                }
                else if(userDrinking == '2')
                {
                    var data = 'No, Never';
                }
                else if(userDrinking == '3')
                {
                    var data = 'With Company';
                }
                else if(userDrinking == '4')
                {
                    var data = 'Yes, Please';
                }
                else
                {
                    var data = 'No Answer';
                }
                
                var updatedata = angular.element( document.querySelector('.renderDrinking_val'));
                updatedata.text(data);
            }
            else
            {
                console.log('error');
            }
        });
    };

  /* Used to Update the Drinking of the User */

$scope.updateEducation = function ()
    {
        userEducation = $scope.userEducation;
        $http.post('updateEducation', {userEducation: userEducation}).then(function (results)
        {
            if (results.data == 'update_success')
            {
                console.log('success');
                
                 if(userEducation == '0')
                {
                    var data = 'No Answer';
                }
                else if(userEducation == '1')
                {
                    var data = 'School only';
                }
                else if(userEducation == '2')
                {
                    var data = 'Trade / Technical';
                }
                else if(userEducation == '3')
                {
                    var data = 'College / University';
                }
                else if(userEducation == '4')
                {
                    var data = 'Advanced Degree';
                }
                else
                {
                    var data = 'No Answer';
                }
                
                var updatedata = angular.element( document.querySelector('.renderEducation_val'));
                updatedata.text(data);
            }
            else
            {
                console.log('error');
            }
        });
    };
    
    
     /* Used to Update the Drinking of the User */
$scope.updateJob = function ()
    {
        userJob = $scope.userJob;
        $http.post('updateJob', {userJob: userJob}).then(function (results)
        {
            if (results.data == 'update_success')
            {
                console.log('success');
                var updatedata = angular.element( document.querySelector('.renderJob_val'));
                updatedata.text(userJob);
            }
            else
            {
                console.log('error');
            }
        });
        
    };
    
    /* Used to Update the Company of the User */
$scope.updateCompany = function ()
    {
        userCompany = $scope.userCompany;
        $http.post('updateCompany', {userCompany: userCompany}).then(function (results)
        {
            if (results.data == 'update_success')
            {
                console.log('success');
                var updatedata = angular.element( document.querySelector('.renderCompany_val'));
                updatedata.text(userCompany);
                
            }
            else
            {
                console.log('error');
            }
        });
        
    };

/* Used to Update the Company of the User */
$scope.updateIncome = function ()
    {
        userIncome = $scope.userIncome;
        $http.post('updateIncome', {userIncome: userIncome}).then(function (results)
        {
            if (results.data == 'update_success')
            {
                console.log('success');
                
                if(userIncome == '0')
                {
                    var data = 'No Answer';
                }
                else if(userIncome == '1')
                {
                    var data = 'Low';
                }
                else if(userIncome == '2')
                {
                    var data = 'Average';
                }
                else if(userIncome == '3')
                {
                    var data = 'High';
                }
                else
                {
                    var data = 'No Answer';
                }
                
                var updatedata = angular.element( document.querySelector('.Incomerender_val'));
                updatedata.text(data);
                
                
                
            }
            else
            {
                console.log('error');
            }
        });
        
    };
    
    /* Used to Update the Company of the User */
$scope.updateEyecolor  = function ()
    {
        userEyecolor = $scope.userEyecolor;
        $http.post('updateEyecolor ', {userEyecolor: userEyecolor}).then(function (results)
        {
            if (results.data == 'update_success')
            {
                console.log('success');
                if(userEyecolor == '0')
                {
                    var data = 'No Answer';
                }
                else if(userEyecolor == '1')
                {
                    var data = 'Black';
                }
                else if(userEyecolor == '2')
                {
                    var data = 'Blue';
                }
                else
                {
                    var data = 'No Answer';
                }
                
                var updatedata = angular.element( document.querySelector('.renderEyeColor_val'));
                updatedata.text(data);
                
            }
            else
            {
                console.log('error');
            }
        });
        
    };
    
        /* Used to Update the Company of the User */
$scope.updateHaircolor  = function ()
    {
        userHaircolor = $scope.userHaircolor;
        $http.post('updateHaircolor ', {userHaircolor: userHaircolor}).then(function (results)
        {
            if (results.data == 'update_success')
            {
                console.log('success');
                 if(userHaircolor == '0')
                {
                    var data = 'No Answer';
                }
                else if(userHaircolor == '1')
                {
                    var data = 'Black';
                }
                else if(userHaircolor == '2')
                {
                    var data = 'Blue';
                }
                else
                {
                    var data = 'No Answer';
                }
                var updatedata = angular.element( document.querySelector('.renderHairColor_val'));
                updatedata.text(data);
            }
            else
            {
                console.log('error');
            }
        });
        
    };
    
            /* Used to Update the Company of the User */
$scope.updateLiving  = function ()
    {
        //userLiving = $scope.userLiving;
        userLiving = localStorage.getItem("cli-city");
        userLivingAddr = localStorage.getItem("cli-address");
        
        $http.post('updateLiving ', {userLiving: userLiving, userLivingAddr : userLivingAddr}).then(function (results)
        {
            if (results.data == 'update_success')
            {
                console.log('success');
                var updatedata = angular.element( document.querySelector('.userLiving_val'));
                updatedata.text(userLivingAddr);
                var updatedata = angular.element( document.querySelector('#userLocation'));
                updatedata.text(userLivingAddr);
            }
            else
            {
                console.log('error');
            }
        });
        
    };
    
                /* Used to Contact Us of the User */
$scope.updateContactUs  = function ()
    {
        contactUsType = $scope.contactUsType;
        contactUsComments = $scope.contactUsComments;
        $scope.data.show = false;
        
        $http.post('updateContactUs ', {comments: contactUsComments, type: contactUsType}).then(function (results)
        {
            $scope.data.show = true
            if (results.data == 'success')
            {
                $scope.data.msg = 'Contact form sent succesfully'
                console.log('success');
            }
            else
            {
                console.log('error');
            }
        });
        
    };
    



  
    
    ////// Profile Details ///////






});