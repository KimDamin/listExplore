<?php
	boards [
		{"idx": 1, "author": ppch0305, "content": 1234}
		{"idx": 2, "author": ppch0305, "content": 1235}
		{"idx": 3, "author": damin0311, "content": 4682}
		{"idx": 4, "author": ppch0305, "content": 325}
		{"idx": 5, "author": ppch, "content": 1234}
	]

	$sql = "DELETE FROM boards WHERE author = ?";
	$q = $con->prepare($sql);
	$q->execute([ppch0305]);
	fetch()
	fetchAll()