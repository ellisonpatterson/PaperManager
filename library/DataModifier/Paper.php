<?php

class DataModifier_Paper extends DataModifier
{
    public function insertPaper($paperId, $title, $abstract, $citation)
    {
        $stmt = $this->_getDb()->prepare('INSERT INTO `papers` (id, title, abstract, citation) VALUES (:id, :title, :abstract, :citation)');
        $stmt->bindParam(':id', $paperId);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':abstract', $abstract);
        $stmt->bindParam(':citation', $citation);

        $stmt->execute();
    }

    public function incrementPageView($paperId)
    {
        $stmt = $this->_getDb()->prepare('UPDATE `papers` SET `page_view` = `page_view` + 1 WHERE `id` = :id');
        $stmt->bindParam(':id', $paperId);

        $stmt->execute();
    }

    public function updatePaper($paperId, $title, $abstract, $citation)
    {
        $stmt = $this->_getDb()->prepare('UPDATE `papers` SET id = :id, title = :title, abstract = :abstract, citation = :citation WHERE `id` = :id');
        $stmt->bindParam(':id', $paperId);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':abstract', $abstract);
        $stmt->bindParam(':citation', $citation);

        $stmt->execute();
    }

    public function deletePaper($paperId)
    {
        $stmt = $this->_getDb()->prepare('DELETE FROM `papers` WHERE `id` = :id');
        $stmt->bindParam(':id', $paperId);

        $stmt->execute();
    }

    public function insertAuthorship($facultyId, $paperId)
    {
        $stmt = $this->_getDb()->prepare('INSERT INTO `authorship` (facultyId, paperId) VALUES (:facultyId, :paperId)');
        $stmt->bindParam(':facultyId', $facultyId);
        $stmt->bindParam(':paperId', $paperId);

        $stmt->execute();
    }

    public function deleteAuthorship($paperId)
    {
        $stmt = $this->_getDb()->prepare('DELETE FROM `authorship` WHERE `paperId` = :paperId');
        $stmt->bindParam(':paperId', $paperId);

        $stmt->execute();
    }

    public function insertPaperKeyword($paperId, $keyword)
    {
        $stmt = $this->_getDb()->prepare('INSERT INTO `paper_keywords` (id, keyword) VALUES (:id, :keyword)');
        $stmt->bindParam(':id', $paperId);
        $stmt->bindParam(':keyword', $keyword);

        $stmt->execute();
    }

    public function deletePaperKeyword($paperId)
    {
        $stmt = $this->_getDb()->prepare('DELETE FROM `paper_keywords` WHERE `id` = :id');
        $stmt->bindParam(':id', $paperId);

        $stmt->execute();
    }
}