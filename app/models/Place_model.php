<?php

class Place_model
{
    private
        $dbh;

    function __construct()
    {
        $this->dbh = new Database;
    }

    public function get_all_places()
    {
        return $this->dbh->get("SELECT * FROM place");
    }

    public function get_single_place($column, $value)
    {
        return $this->dbh->get_single("SELECT * FROM place WHERE $column='$value'");
    }

    public function add_place($new_place)
    {
        $name = $new_place["name"];
        $city = $new_place["city"];
        $country = $new_place["country"];
        $rating = $new_place["rating"];
        $picture = $new_place["picture"];
        $this->dbh->query("INSERT INTO place (id, name, city, country, rating, picture) VALUES ('', '$name', '$city', '$country', '$rating', '$picture')");
    }

    public function update_place($edited_place = [])
    {
        $id = $edited_place["id"];
        $name = $edited_place["name"];
        $city = $edited_place["city"];
        $country = $edited_place["country"];
        $rating = $edited_place["rating"];
        $picture = $edited_place["picture"];
        $this->dbh->query("UPDATE place SET name='$name', city='$city', country='$country', rating='$rating', picture='$picture'  WHERE id='$id'");
    }

    public function delete_place($id)
    {
        $this->dbh->query("DELETE FROM place WHERE id='$id'");
    }
}
