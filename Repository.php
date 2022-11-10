<?php
class Repository
{
    public $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function createCompetitor($array)
    {
        $this->dbh->query('INSERT INTO Competitors(name, sex, age, country, marks) VALUES (' .
            "'" . $array['name'] . "', " .
            "'" . $array['sex'] . "', " .
            "'" . $array['age'] . "', " .
            "'" . $array['country'] . "', " .
            "'" . $array['marks'] . "')"
        );
    }

    public function readCompetitors()
    {
        return $this->dbh->query('SELECT * FROM Competitors')->fetchAll();
    }

    public function updateCompetitor($array)
    {
        $this->dbh->query('UPDATE Competitors SET ' .
            'name = ' . $array['name'] . ', ' .
            'sex = ' . $array['sex'] . ', ' .
            'age = ' . $array['age'] . ', ' .
            'country = ' . $array['country'] . ' , ' .
            'marks = ' . $array['marks'] . ' ' .
            'WHERE id = ' . $array['id']);
    }

    public function deleteCompetitor($array)
    {
        return $this->dbh->query('DELETE FROM Competitors WHERE id = ' . $array['id']);
    }
}