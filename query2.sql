-----------------------------------------------------------------------------
-----------------------------------------------------------------------------
SELECT 
    f.first_name,
    f.last_name,
    s.available_subject_name AS subject_name,
    c.time_start,
    c.time_end,
    c.day,
    sy.year_start,
    sy.year_end,
    sem.semester
FROM 
    faculty f
JOIN 
    classes c ON f.faculty_id = c.faculty_id
JOIN 
    available_subjects s ON c.available_subject_id = s.available_subject_id
JOIN 
    semesters sem ON s.semester_id = sem.semester_id
JOIN 
    school_years sy ON sem.school_year_id = sy.school_year_id;
-----------------------------------------------------------------------------
-----------------------------------------------------------------------------
SELECT 
avs.available_subject_name as subjet_name,
c.day,
c.time_start,
c.time_end,
r.room_number,
f.first_name,
f.last_name

FROM 
	Available_subjects avs
JOIN 
	School_years as sy ON sy.school_year_id = avs.school_year_id
JOIN
	Classes as c ON c.available_subject_id = avs.available_subject_id
JOIN
	Rooms as r ON r.registrar_id = avs.registrar_id
JOIN 
	Faculty as f ON f.faculty_id = c.faculty_id
JOIN 
    Semesters as sem ON avs.semester_id = sem.semester_id
WHERE
	sy.year_start = 2019 AND sy.year_end = 2020
    AND sem.semester = 1;
-----------------------------------------------------------------------------
-----------------------------------------------------------------------------
SELECT 
    s.student_id,
    s.first_name,
    s.last_name,
    avs.available_subject_name,
    g.grade
FROM 
    Students s
JOIN
    Grades g ON g.student_id = s.student_id
JOIN 
    Available_subjects avs ON g.class_id = avs.available_subject_id
JOIN
    Grading_periods gp ON g.grading_period_id = gp.grading_period_id
JOIN
    Semesters sem ON gp.semester_id = sem.semester_id
JOIN
    School_years sy ON sem.school_year_id = sy.school_year_id
WHERE
	g.student_id = 2
    AND sy.year_start = 2019 
    AND sy.year_end = 2020
    AND sem.semester = 1 ;
-----------------------------------------------------------------------------
-----------------------------------------------------------------------------
SELECT 
    r.room_number,
    COUNT(c.class_id) AS number_of_classes
FROM 
    rooms r
JOIN 
    classes c ON r.room_id = c.room_id
JOIN 
    available_subjects avs ON c.available_subject_id = avs.available_subject_id
JOIN 
    semesters sem ON avs.semester_id = sem.semester_id
JOIN 
    school_years sy ON sem.school_year_id = sy.school_year_id
WHERE 
    sy.year_start = 2019
    AND sy.year_end = 2020
    AND sem.semester = 2
GROUP BY 
    r.room_number;






