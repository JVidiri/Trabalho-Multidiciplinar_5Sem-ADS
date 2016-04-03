<?php
/*
	Interface for database based handlers classes. 
*/
interface dbInterface
{
	/* Receives a complete object to add, connects to the bank and add it. */
    public function insert($toAdd);
    /* Receives a complete object to delete, connects to the bank and delete it. */
    public function delete($toDelete);
    /* Receives a complete object to update, update it in the bank (the id must be the same). */
    public function update($toUpdate);	    
    /* Receives the first user to consider and get you the next 25 user */
    public function select($firstElement);	
}
?>