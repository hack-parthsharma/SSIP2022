<?php 
include('../allfiledata.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/admin_features.css">
    <title>Document</title>
</head>
<body>
    <section class="add-dep-hero">
        <div>
            <h1>Add Departments</h1>
        </div>
        <div>
            <div>
                <form action="">
                    <input type="text" placeholder="ex.. D005">
                    <input type="text" placeholder="ex.. finance">
                    <input type="submit" value="ADD">
                </form>
            </div>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Department Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                              if (is_array($fetchDataDepartment)) {
                                   $sn = 1;
                                   foreach ($fetchDataDepartment as $data) {
                                        ?>
                                        <tr>
                                             <td>
                                                  <?php echo $sn; ?>
                                             </td>
                                             <td>
                                                  <?php echo $data['id'] ?? ''; ?>
                                             </td>
                                             <td>
                                                  <?php echo $data['name'] ?? ''; ?>
                                             </td>
                                        </tr>
                                        <?php
                                        $sn++;
                                   }
                              } else { ?>
                                   <tr>
                                        <td colspan="8">
                                             <?php echo $fetchDataDepartment; ?>
                                        </td>
                                   <tr>
                                        <?php
                              } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>