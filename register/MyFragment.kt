package com.example.register

import android.content.Context
import android.content.Intent
import android.content.SharedPreferences
import android.os.Bundle
import android.preference.PreferenceManager
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.*
import androidx.core.widget.NestedScrollView
import androidx.fragment.app.Fragment
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.android.volley.Request
import com.android.volley.Response
import com.android.volley.toolbox.StringRequest
import com.android.volley.toolbox.Volley
import org.json.JSONObject

class MyFragment : Fragment() {
    val data = ArrayList<ItemsViewModel>()

    override fun onCreateView(
        inflater: LayoutInflater,
        container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        val view:View = inflater.inflate(R.layout.fragment_my, container, false)
        return view

//        return super.onCreateView(inflater, container, savedInstanceState)
    }

    override fun onViewCreated(view: View, savedInstanceState: Bundle?) {
        super.onViewCreated(view, savedInstanceState)

    }

    //    fun getRoast(context: Context) {
//        val queue = Volley.newRequestQueue(context)
//        val url = "https://www.google.com"
//
//// Request a string response from the provided URL.
//        val stringRequest = StringRequest(
//            Request.Method.GET, url,
//            Response.Listener<String> { response ->
//                Toast.makeText(context, "Hello", Toast.LENGTH_SHORT).show()
//
//            },
//            Response.ErrorListener {
//                Toast.makeText(context, "taht didn't work", Toast.LENGTH_SHORT).show()
//            })
//
//// Add the request to the RequestQueue.
//        queue.add(stringRequest)
//
//        Toast.makeText(context, "Hello", Toast.LENGTH_SHORT).show()
//    }
//
//}
//fun getLogin(context: Context){
//    val email="member01"
//    val password="Admin@123"
//    // Calling Login API
//    val queue = Volley.newRequestQueue(context)
//    val url = "https://api-smartflo.tatateleservices.com/v1/auth/login"
//
//    // Request a string response
//    val stringRequest = object : StringRequest(
//        Request.Method.POST, url,
//        Response.Listener<String> { response ->
//            val json = JSONObject(response)
//            val token = json.getString("access_token")
//            //Store token in sharedPreference
//            sharedPreferences = PreferenceManager.getDefaultSharedPreferences(context)
//            editor = sharedPreferences.edit()
//            editor.putString(getString(R.string.name), token)
//            editor.commit()
//            storedToken = sharedPreferences.getString(getString(R.string.name), "").toString()
//
//            Toast.makeText(context,storedToken, Toast.LENGTH_SHORT).show()
//
//
//        },
//        Response.ErrorListener {
//
//            Toast.makeText(context, "taht didn't work", Toast.LENGTH_SHORT).show()
//        }) {
//        //adding params
//        override fun getParams(): MutableMap<String, String>
//        {
//            val params = HashMap<String, String>()
//            params.put("email", email)
//            params.put("password", password)
//            return params
//        }
//    }
//    // Add the request to the RequestQueue.
//    queue.add(stringRequest)
//}
//}
    fun callContactApi(context: Context,token:String?,page:Int) {

        //CALLING CONTACT API
        val queue = Volley.newRequestQueue(context)
        val progressBar : ProgressBar? = view?.findViewById(R.id.progressBar)

        var url = "https://api-smartflo.tatateleservices.com/v1/contacts?page=$page"
        val stringRequest = object : StringRequest(
            Request.Method.GET, url,
            Response.Listener<String>
            { response ->
                val json = JSONObject(response)
                var size = json.getString("size")
                var currentPage= json.getString("page")
                val jsonArray = json.getJSONArray("results")
                val recyclerview : RecyclerView? = view?.findViewById(R.id.recyclerview)
                    recyclerview?.layoutManager = LinearLayoutManager(context)


                // ArrayList of class ItemsViewModel

                for (i in 0 until jsonArray.length()) {
                    progressBar?.visibility = View.INVISIBLE

                    val jsonObj = jsonArray.getJSONObject(i)
//                    Toast.makeText(context,jsonArray.toString(), Toast.LENGTH_SHORT).show()

                    val name = jsonObj.getString("name")
                    val phoneNumber = jsonObj.getString("phone_number")
                    Toast.makeText(context,currentPage, Toast.LENGTH_SHORT).show()

                    data.add(ItemsViewModel("NAME : " + name, "phoneNumber : " + phoneNumber))
                }
                progressBar?.visibility = View.VISIBLE
                val adapter = CustomAdapter(data)
                // Setting the Adapter with the recyclerview
                    recyclerview?.adapter = adapter
                adapter.setOnLoadMoreListener()
                adapter.notifyDataSetChanged();

                if(size.toInt() == 0)
                {
                    progressBar?.visibility = View.INVISIBLE
                }
            },
            Response.ErrorListener
            {
                Toast.makeText(context, "that didn't work", Toast.LENGTH_SHORT).show()
            }) {
            //adding header
            override fun getHeaders(): Map<String, String> {
                val headers = HashMap<String, String>()
                headers.put("Content-Type", "application/json");
                headers.put("Authorization", "Bearer " + token)
                return headers
            }
        }
        // Add the request to the RequestQueue.
        queue.add(stringRequest)
    }

}