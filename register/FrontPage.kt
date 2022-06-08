package com.example.register

import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import androidx.appcompat.app.AppCompatActivity
import androidx.fragment.app.FragmentManager
import androidx.fragment.app.FragmentTransaction
class FrontPage : AppCompatActivity() {
    lateinit var editText: EditText

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)
        title = "KotlinApp"
        val fragmentManager: FragmentManager = supportFragmentManager
        val fragmentTransaction: FragmentTransaction = fragmentManager.beginTransaction()
        val myFragment = MyFragment()
        val button:Button = findViewById(R.id.btnSendData)
        editText = findViewById(R.id.editText)
        button.setOnClickListener {
            val bundle = Bundle()
            bundle.putString("message", editText.text.toString())
            myFragment.arguments = bundle
            fragmentTransaction.add(R.id.frameLayout, myFragment).commit()
        }
    }
}
