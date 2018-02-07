$(document).ready(function() {
    var url1 = "http://182.74.137.194:8280/pgr/external/mobileservice?serviceId=getComplaintByID&ComplaintId=312KLB";
    $.ajax({
        crossDomain: true,
        //   method: "POST",
        url: url1,
        timeout: 30000,
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },


        success: function(data) {

            var json = JSON.stringify(eval("(" + data + ")"));
            var obj = JSON.parse(json);
            //alert("message"+obj.ComplaintCategoryListResult[0].complaintname);

         //   alert("message" + obj[0].ComplaintListHistory[0].complaintid);

            var id01 = '';
            var id02 = '';
            var id03 = '';
            var id04 = '';
            var id06 = '';
            var id07 = '';
            var id08 = '';
            var id09 = '';
            var id010 = '';
            var id011 = '';
            var id05 = '';
            var id012 = '';
            var id013 = '';
            var id014 = '';
            var id015 = '';
            var id016 = '';
            var id017 = '';
            var id018 = '';
            var id019 = '';


            for (var j = 0; j < obj.length; j++) {

                for (var i = 0; i < obj[j].ComplaintListHistory.length; i++) {

                    id01 += '<td>' + obj[j].ComplaintListHistory[i].complaintid + '</td>';
                    id02 += '<td>' + obj[j].ComplaintListHistory[i].QAstatus + '</td>';
                    id03 += '<td>' + obj[j].ComplaintListHistory[i].ReopencomplaintStatus + '</td>';
                    id04 += '<td>' + obj[j].ComplaintListHistory[i].SLA + '</td>';
                    id05 += '<td>' + obj[j].ComplaintListHistory[i].complaintopendate + '</td>';
                    id06 += '<td>' + obj[j].ComplaintListHistory[i].complainttype + '</td>';
                    id07 += '<td>' + obj[j].ComplaintListHistory[i].CustomerMobile + '</td>';
                    id08 += '<td>' + obj[j].ComplaintListHistory[i].OfficialMobile + '</td>';
                    id09 += '<td>' + obj[j].ComplaintListHistory[i].ManagementMobile + '</td>';
                    id010 += '<td>' + obj[j].ComplaintListHistory[i].CustomerName + '</td>';
                    id011 += '<td>' + obj[j].ComplaintListHistory[i].Zone + '</td>';
                    id012 += '<td>' + obj[j].ComplaintListHistory[i].Division + '</td>';
                    id013 += '<td>' + obj[j].ComplaintListHistory[i].Area + '</td>';
                    id014 += '<td>' + obj[j].ComplaintListHistory[i].Street + '</td>';
                    id015 += '<td>' + obj[j].ComplaintListHistory[i].Landmark + '</td>';
                    id016 += '<td>' + obj[j].ComplaintListHistory[i].complaintcurrentstatus + '</td>';
                    id017 += '<td>' + obj[j].ComplaintListHistory[i].complaintcloseddate + '</td>';
                    id018 += '<td>' + obj[j].ComplaintListHistory[i].Officialname + '</td>';
                    id019 += '<td>' + obj[j].ComplaintListHistory[i].Officialresponsemessage + '</td>';
                }
            }


            //  $('#reportlist').empty();
            document.getElementById("1pop").innerHTML = id01;
            document.getElementById("2pop").innerHTML = id02;
            document.getElementById("3pop").innerHTML = id03;
            document.getElementById("4pop").innerHTML = id04;
            document.getElementById("5pop").innerHTML = id05;
            document.getElementById("6pop").innerHTML = id06;
            document.getElementById("7pop").innerHTML = id07;
            document.getElementById("8pop").innerHTML = id08;
            document.getElementById("9pop").innerHTML = id09;
            document.getElementById("10pop").innerHTML = id010;
            document.getElementById("11pop").innerHTML = id011;
            document.getElementById("12pop").innerHTML = id012;
            document.getElementById("13pop").innerHTML = id013;
            document.getElementById("14pop").innerHTML = id014;
            document.getElementById("15pop").innerHTML = id015;
            document.getElementById("16pop").innerHTML = id016;
            document.getElementById("17pop").innerHTML = id017;
            document.getElementById("18pop").innerHTML = id018;
            document.getElementById("19pop").innerHTML = id019;




        },
        error: function(data) {
            alert("error");
        }
    });
});