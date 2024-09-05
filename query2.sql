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



