package com.example.register

import android.annotation.SuppressLint
import android.content.SharedPreferences
import android.os.Bundle
import android.preference.PreferenceManager
import android.view.MotionEvent
import android.view.View
import android.view.ViewTreeObserver
import android.widget.ProgressBar
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import androidx.core.widget.NestedScrollView
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.android.volley.Request
import com.android.volley.Response
import com.android.volley.toolbox.StringRequest
import com.android.volley.toolbox.Volley
import org.json.JSONObject


class ContactApiActivity : AppCompatActivity() {
    val data = ArrayList<ItemsViewModel>()
    private lateinit var sharedPreferences: SharedPreferences
    private val recyclerView: RecyclerView? = null
    private lateinit var mScrollView: NestedScrollView
    private lateinit var progressBar: ProgressBar
    var page = 1
    val limit = 10
    private lateinit var myFragment: MyFragment


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_contact_api)

        sharedPreferences = PreferenceManager.getDefaultSharedPreferences(this)
        var token = sharedPreferences.getString(getString(R.string.name), "")
        mScrollView = findViewById(R.id.idNestedSV);

        val recyclerview = findViewById<RecyclerView>(R.id.recyclerview)
        recyclerview.layoutManager = LinearLayoutManager(this)
        myFragment = MyFragment()
        supportFragmentManager
            .beginTransaction()
            .add(R.id.container, myFragment, "MyFragment")
            .commit()

        //this is fragment method, we call it from activity
//        myFragment.getLogin(this)
        myFragment.callContactApi(this, token,page)
//        getData(token,pageNumber)

        mScrollView.setOnScrollChangeListener(NestedScrollView.OnScrollChangeListener { v, scrollX, scrollY, oldScrollX, oldScrollY ->

            if (scrollY == v.getChildAt(0).measuredHeight - v.measuredHeight) {
                page += 1
//                getData(token,pageNumber)
                myFragment.callContactApi(this, token,page)
            }
        })

    }
}

//    private fun getData(token: String?, page: Int) {
//
//        //CALLING CONTACT API
//        val queue = Volley.newRequestQueue(this)
////        val progressBar: ProgressBar = findViewById(R.id.progressBar)
//        var progressBar:ProgressBar= findViewById(R.id.progressBar)
//
//
//        var url = "https://api-smartflo.tatateleservices.com/v1/contacts?page=$page"
////        val progressBar: ProgressBar = findViewById(R.id.progressBar)
//
//        val stringRequest = object : StringRequest(
//            Request.Method.GET, url,
//            Response.Listener<String>
//            { response ->
//                val json = JSONObject(response)
//                var size = json.getString("size")
//                var currentPage= json.getString("page")
//                val jsonArray = json.getJSONArray("results")
//
//                val recyclerview = findViewById<RecyclerView>(R.id.recyclerview)
//                recyclerview.layoutManager = LinearLayoutManager(this)
//
//                // ArrayList of class ItemsViewModel
//
//                    for (i in 0 until jsonArray.length()) {
//                        progressBar.visibility = View.INVISIBLE
//
//                        val jsonObj = jsonArray.getJSONObject(i)
//                        Toast.makeText(this, currentPage, Toast.LENGTH_SHORT).show()
//
//                        val name = jsonObj.getString("name")
//                        val phoneNumber = jsonObj.getString("phone_number")
//
//                        data.add(ItemsViewModel("NAME : " + name, "phoneNumber : " + phoneNumber))
//                    }
//
//                progressBar.visibility = View.VISIBLE
//                val adapter = CustomAdapter(data)
//
//                // Setting the Adapter with the recyclerview
//                recyclerview.adapter = adapter
//                adapter.setOnLoadMoreListener()
//                adapter.notifyDataSetChanged();
//
////                Toast.makeText(this,limit, Toast.LENGTH_SHORT).show()
//                if(size.toInt() == 0)
//                {
//                    progressBar.visibility = View.INVISIBLE
//                }
//            },
//            Response.ErrorListener
//            {
//                Toast.makeText(this, "INVALID", Toast.LENGTH_SHORT).show()
//            }) {
//            //adding header
//            override fun getHeaders(): Map<String, String> {
//                val headers = HashMap<String, String>()
//                headers.put("Content-Type", "application/json");
//                headers.put("Authorization", "Bearer " + token.toString())
//                return headers
//            }
//        }
//        // Add the request to the RequestQueue.
//        queue.add(stringRequest)
//    }
//
//}

