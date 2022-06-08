package com.example.register

import android.content.Context
import android.content.SharedPreferences
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.preference.PreferenceManager
import android.widget.EditText

class ActivityToFragment : AppCompatActivity() {

    private lateinit var sharedPreferences: SharedPreferences
    private lateinit var myFragment: MyFragment
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_to_fragment)
        sharedPreferences = PreferenceManager.getDefaultSharedPreferences(this)
        var token = sharedPreferences.getString(getString(R.string.name), "")

        myFragment = MyFragment()
        supportFragmentManager
            .beginTransaction()
            .add(R.id.container, myFragment , "MyFragment")
            .commit()

        //this is fragment method, we call it from activity
////        myFragment.getLogin(this)
//        myFragment.callContactApi(this, token)
    }

}
