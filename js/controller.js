var userApp = angular.module('UserApp', ['initialValue', 'ngValidate', 'ngRoute', '720kb.datepicker']);
userApp.controller('UserListCtrl', function($scope, $http) {

  // initialize default values of variables & arrays
	$scope.add_user = true;
  $scope.position = 'CEO';
  $scope.authorized = 'NO';
  $scope.pagedItems = [];

  // function to clear out all fields
  $scope.clear_fields = function() {

    $scope.full_name     =  null;
    $scope.addr_first    =  null;
    $scope.addr_second   =  null;
    $scope.addr_third    =  null;
    $scope.postcode      =  null;
    $scope.dob           =  null;
    $scope.email_addr    =  null;
    $scope.authorized    =  'NO';

  }

  // validate form inputs with angular-validate module
  $scope.validationOptions = {

    rules: {
      full_name: "required",
      addr_first: "required",
      addr_second: "required",
      postcode: "required",
      dob: "required",
      email_addr: {
        required: true,
        email: true
      }
    },
    messages: {
      full_name: "Enter full name",
      addr_first: "Address Line 1",
      addr_second: "Address Line 2",
      postcode: "Enter valid postcode",
      dob: "Enter valid date of birth",
      email_addr: "Enter valid email address"
    }

  }

  // Get all records of users stored in localStorage
  for(var i=0, len=localStorage.length; i<len; i++) {
    var key = localStorage.key(i);
    var value = localStorage[key];
    var allUser = JSON.parse(value);
    $scope.pagedItems.push( allUser );
  }
	
  // function to add new user record in localStorage
	$scope.user_submit = function($event) {

    var exist = false;

    if($scope.addUserForm.validate()) {

      // Store new user record in an object         
      var newUser = {
        id: localStorage.length,    // id is used to identify this property when being delete from localStorage  
        fullname: $scope.full_name,
        firstAddress: $scope.addr_first,
        secondAddress: $scope.addr_second,
        thirdAddress: $scope.addr_third,
        postCode: $scope.postcode,
        dateOfBirth: $scope.dob,
        emailAddress: $scope.email_addr,
        currentPosition: $scope.position,
        authorization: $scope.authorized,
        guidValue: $scope.guid
      };

      // checking for email address already exists in the localStorage
      for (var i = 0; i < $scope.pagedItems.length; i++) {
        if(newUser.emailAddress === $scope.pagedItems[i].emailAddress) {
          exist = true;
          alert("User already existed with this email address");
          break; 
        }
      }

      if (!exist) {

        // Add newUser object to localStorage as the value to a new property
        localStorage.setItem( 'item' + localStorage.length, JSON.stringify(newUser) );

        // Add new user object to the model by adding it to the pageItems array
        $scope.pagedItems.push( newUser );

        // call function to clear out all input fields
        $scope.clear_fields();

      }

    }
    
    // stop propagation of ng-click event
    $event.preventDefault();

  }

  // function to delete specific user record from the list
  $scope.user_delete = function(index) {

    // index param is an ngRepeat variable  
    // Delete item from localStorage
    localStorage.removeItem( 'item' + index );

    // Remove item from the contacts array
    $scope.pagedItems.splice( index, 1 );

  }

  // function to edit user record in localStorage
  $scope.user_edit = function(index) {  

    $scope.update_user = true;
    $scope.add_user = false;

    var selectedUser = 'item' + index;
    var userRecord = localStorage[selectedUser];
    var parsedRecord = JSON.parse(userRecord);

    $scope.id           = index;
    $scope.full_name    = parsedRecord.fullname;
    $scope.addr_first   = parsedRecord.firstAddress;
    $scope.addr_second  = parsedRecord.secondAddress;
    $scope.addr_third   = parsedRecord.thirdAddress;
    $scope.postcode     = parsedRecord.postCode;
    $scope.dob          = parsedRecord.dateOfBirth;
    $scope.email_addr   = parsedRecord.emailAddress;
    $scope.position     = parsedRecord.currentPosition;
    $scope.authorized   = parsedRecord.authorization;

  }

  // function to update particular user record in localStorage
  $scope.user_update = function($event) {

    // Get existing user record in an object         
    var updateUser = {
      id: $scope.id,
      fullname: $scope.full_name,
      firstAddress: $scope.addr_first,
      secondAddress: $scope.addr_second,
      thirdAddress: $scope.addr_third,
      postCode: $scope.postcode,
      dateOfBirth: $scope.dob,
      emailAddress: $scope.email_addr,
      currentPosition: $scope.position,
      authorization: $scope.authorized,
    };

    // Update localStorage data with new values
    localStorage.setItem( 'item' + updateUser.id, JSON.stringify(updateUser) );

    // Update existing user object to the model
    for (var i = 0; i < $scope.pagedItems.length; i++) {
      if(updateUser.id === $scope.pagedItems[i].id) { 
        console.log('inside loop');
        $scope.pagedItems[i].fullname = $scope.full_name;
        $scope.pagedItems[i].firstAddress = $scope.addr_first;
        $scope.pagedItems[i].secondAddress = $scope.addr_second;
        $scope.pagedItems[i].thirdAddress = $scope.addr_third;
        $scope.pagedItems[i].postCode = $scope.postcode;
        $scope.pagedItems[i].dateOfBirth = $scope.dob;
        $scope.pagedItems[i].emailAddress = $scope.email_addr;
        $scope.pagedItems[i].currentPosition = $scope.position;
        $scope.pagedItems[i].authorization = $scope.authorized;
        break; 
      }
    }

    $scope.clear_fields();
    $scope.add_user = true;
    $scope.update_user = false;

    // stop propagation of ng-click event
    $event.preventDefault();

  }

});

// directive is used to update datepicker model
userApp.directive('datepicker', function() {
  return {
    restrict: 'A',
    require: 'ngModel',
    link: function(scope, elem, attrs, ngModelCtrl) {
      var updateModel = function (dateText) {
        scope.$apply(function() {
          ngModelCtrl.$setViewValue(dateText);
        });
      };
      var options = {
        dateFormat: "dd/mm/yy",
        onSelect: function(dateText) {
          updateModel(dateText);
        }
      };
      elem.datepicker(options);
    }
  }
});