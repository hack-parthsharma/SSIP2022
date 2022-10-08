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

     function userController($scope) {
          $scope.user = users;
      };
})();