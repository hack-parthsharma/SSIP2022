(function () {

     // alert("hello worlds!!");
     var resources = [
          {
               CaseID: "C0001",
               Department: "Farming",
               Subject: "Land Transfer",
               CreatedBy: "U001",
               CreatedDate: "20/02/2021",
               Remarks: " ",
               Status: "Approved",
               CurrentDep: "DDO",
               Destination: "DDO"
          },
          {
               CaseID: "C0002",
               Department: "Farming",
               Subject: "Survey",
               CreatedBy: "U001",
               CreatedDate: "20/02/2020",
               Remarks: " ",
               Status: "Pending",
               CurrentDep: "Landing",
               Destination: "DDO"
          },
          {
               CaseID: "C0003",
               Department: "Farming",
               Subject: "Land cancellation",
               CreatedBy: "U001",
               CreatedDate: "20/02/2019",
               Remarks: " ",
               Status: "Approved",
               CurrentDep: "Farming",
               Destination: "DDO"
          },
          {
               CaseID: "C0004",
               Department: "Land",
               Subject: "Land transfer",
               CreatedBy: "U001",
               CreatedDate: "27/02/2020",
               Remarks: " ",
               Status: "Pending",
               CurrentDep: "Landing",
               Destination: "DDO"
          },
          {
               CaseID: "C0005",
               Department: "Farming",
               Subject: "Survey",
               CreatedBy: "U001",
               CreatedDate: "10/05/2020",
               Remarks: " ",
               Status: "Approved",
               CurrentDep: "Animal",
               Destination: "DDO"
          },
          {
               CaseID: "C0006",
               Department: "Animal",
               Subject: "Survey",
               CreatedBy: "U001",
               CreatedDate: "3/05/2020",
               Remarks: " ",
               Status: "Pending",
               CurrentDep: "Landing",
               Destination: "DDO"
          },
          {
               CaseID: "C0007",
               Department: "Farming",
               Subject: "Survey",
               CreatedBy: "U001",
               CreatedDate: "7/02/2020",
               Remarks: " ",
               Status: "Approved",
               CurrentDep: "Farm",
               Destination: "DDO"
          },
          {
               CaseID: "C0008",
               Department: "Land",
               Subject: "Land Transfer",
               CreatedBy: "U001",
               CreatedDate: "15/07/2020",
               Remarks: " ",
               Status: "Pending",
               CurrentDep: "Landing",
               Destination: "DDO"
          },
          {
               CaseID: "C0009",
               Department: "Farming",
               Subject: "Survey",
               CreatedBy: "U001",
               CreatedDate: "7/09/2020",
               Remarks: " ",
               Status: "Approved",
               CurrentDep: "Landing",
               Destination: "DDO"
          },
          {
               CaseID: "C0010",
               Department: "Animal",
               Subject: "Survey",
               CreatedBy: "U001",
               CreatedDate: "12/07/2020",
               Remarks: " ",
               Status: "Pending",
               CurrentDep: "Landing",
               Destination: "DDO"
          },
          {
               CaseID: "C0011",
               Department: "Social Welfare",
               Subject: "Social Wellness",
               CreatedBy: "U002",
               CreatedDate: "14/06/2020",
               Remarks: "Please pass the bill",
               Status: "Approved",
               CurrentDep: "Animal",
               Destination: "DDO"
          },
          {
               CaseID: "C0012",
               Department: "Healthcare",
               Subject: "Request for medical",
               CreatedBy: "U002",
               CreatedDate: "16/03/2020",
               Remarks: "Please pass the medical bill",
               Status: "Pending",
               CurrentDep: "Healthcare",
               Destination: "Ayurveda"
          },
          {
               CaseID: "C0013",
               Department: "Auditing",
               Subject: "Auditor request",
               CreatedBy: "U001",
               CreatedDate: "04/03/2020",
               Remarks: "Internal audit",
               Status: "Approved",
               CurrentDep: "Auditing",
               Destination: "DDO"
          },
          {
               CaseID: "C0014",
               Department: "Accounting",
               Subject: "Accounting request",
               CreatedBy: "U002",
               CreatedDate: "14/02/2020",
               Remarks: "Please pass the bill",
               Status: "Pending",
               CurrentDep: "Accounting",
               Destination: "Chief Accountant Office"
          },
          {
               CaseID: "C0015",
               Department: "Agriculture",
               Subject: "Request for pesticides",
               CreatedBy: "U001",
               CreatedDate: "13/04/2020",
               Remarks: "Please pass the bill for pesticides",
               Status: "Pending",
               CurrentDep: "Agriculture",
               Destination: "DDO"
          }

     ];

     var users = [
          // {
          //      name: "Faizal Kadiwal"
          // },
          {
               name: "Manan Patel"
          },
          // {
          //      name: "Parth Sharma"
          // },
          // {
          //      name: "Krish Patel"
          // },
          // {
          //      name: "Nirnay Rawal"
          // }
     ];

     angular.module('dashboard', [])
          .controller('searchitems', searchitems)
          .controller('userController', userController);
     searchitems.$inject = ['$scope'];
     viewController.$inject = ['$scope'];

     function searchitems($scope) {
          $scope.templetes = resources;
          // $scope.recent_follow = recent_follow;
     };

<<<<<<< HEAD
     function userController($scope) {
          $scope.user = users;
      };
})();
=======
     // function viewController($scope) {
     //      $scope.item = resources;
     //  };
})();
>>>>>>> 121f00b903a855ac90785a90e821546e678ae71d
