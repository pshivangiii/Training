package com.example.register

import android.content.ContentValues
import android.content.Context
import android.database.Cursor
import android.database.sqlite.SQLiteDatabase
import android.database.sqlite.SQLiteOpenHelper

class DBHelper(context: Context, factory: SQLiteDatabase.CursorFactory?) :
    SQLiteOpenHelper(context, DATABASE_NAME, factory, DATABASE_VERSION) {

    // below is the method for creating a database by a sqlite query
    override fun onCreate(db: SQLiteDatabase)
    {
        val query = ("CREATE TABLE " + TABLE_NAME + " ("
                + ID_COL + " INTEGER PRIMARY KEY, " +
                NAME_COl + " TEXT," +
                PASSWORD_COL + " TEXT" + ")")

        db.execSQL(query)
    }

    override fun onUpgrade(db: SQLiteDatabase, p1: Int, p2: Int) {
        // this method is to check if table already exists
        db.execSQL("DROP TABLE IF EXISTS " + TABLE_NAME)
        onCreate(db)
    }

    // This method is for adding data in our database
    fun addUser(name : String, password : String ):Boolean
    {
        if(name == "" || password == "")
        {
            return false
        }
        // below we are creating
        // a content values variable
        //copied
        val values = ContentValues()

        values.put(NAME_COl, name)
        values.put(PASSWORD_COL, password)

        val db = this.writableDatabase

        // all values are inserted into database
        db.insert(TABLE_NAME, null, values)
        db.close()
        return true
    }

    //get All Data from DB
    fun getUser(): Cursor?
    {
        val db = this.readableDatabase
        return db.rawQuery("SELECT * FROM " + TABLE_NAME, null)

    }
    fun checkUsernameAndPassword(email:String,password: String):Boolean
    {
        val db=readableDatabase
        val query="SELECT $ID_COL FROM $TABLE_NAME WHERE $NAME_COl = '$email' AND $PASSWORD_COL = '$password'"
        val cursor=db.rawQuery(query, null)
        if(cursor.count <= 0)
        {
            cursor.close()
            return false
        }
        cursor.close()
        return true
    }

    companion object{
        // here we have defined variables for our database

        // below is variable for database name
        private val DATABASE_NAME = "myDB"

        // below is the variable for database version
        private val DATABASE_VERSION = 1

        // below is the variable for table name
        val TABLE_NAME = "myTable"

        // below is the variable for id column
        val ID_COL = "id"

        // below is the variable for name column
        val NAME_COl = "name"

        // below is the variable for password column
        val PASSWORD_COL = "password"
    }
}

