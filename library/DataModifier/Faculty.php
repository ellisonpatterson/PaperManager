<?php

class DataModifier_Faculty extends DataModifier
{
    public class insertAuthorship($facultyId, $paperId)
    {
        $stmt = $this->_getDb()->prepare('INSERT INTO `authorship` (facultyId, paperId) VALUES (:facultyId, :paperId)');
        $stmt->bindParam(':facultyId', $facultyId);
        $stmt->bindParam(':paperId', $paperId);

        $stmt->execute();
    }
}