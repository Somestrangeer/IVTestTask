<?php 

$data = [
	['Иванов', 'Математика', 5],
	['Иванов', 'Математика', 4],
	['Иванов', 'Математика', 5],
	['Петров', 'Математика', 5],
	['Сидоров', 'Физика', 4],
	['Иванов', 'Физика', 4],
	['Петров', 'ОБЖ', 4],
];

//prepared array as a map
$sumArr = [];

$allSubjects = [];
$i = 0;

foreach($data as $item){

	$name = $item[0];
	$subject = $item[1];
	$score = $item[2];

	//if there's no such name and subject in the map we set it and set the value to it
	if(!isset($sumArr[$name][$subject])){
		$sumArr[$name][$subject] = $score;
		$allSubjects[$i] = $subject;
	}
	else{
		$sumArr[$name][$subject] += $score;
	}
	$i++;
}

//remove duplicate values
$uniqueSubjects = array_unique($allSubjects);

//show all subjects in a row
echo "<td>" . implode('</td><td>', array_values($uniqueSubjects)) . "</td>";


foreach ($sumArr as $name => $subject) {
    echo "<tr>
            <td>$name</td>";
    
    //check if there's our key's value otherwise show an empty cell
    foreach ($uniqueSubjects as $subj) {
        echo "<td>" . ($subject[$subj] ?? '') . "</td>";
    }
    
    echo "</tr>";
}

 ?>