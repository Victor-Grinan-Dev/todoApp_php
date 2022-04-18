create table taskslist(
    id integer primary key,
    task varchar(20) not null,
    explanation varchar(20),
    finished boolean,
    responsible varchar(20)
);