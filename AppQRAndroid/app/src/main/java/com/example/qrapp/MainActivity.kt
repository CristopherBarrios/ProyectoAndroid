package com.example.qrapp

import android.content.Intent
import android.support.v7.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.widget.Toast

class MainActivity : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)
    }
    fun ventana(view: View) {
        val hola = Intent(this@MainActivity, Main2Activity::class.java)
        startActivity(hola)
        Toast.makeText(this,"Bienvenido",Toast.LENGTH_LONG).show()
    }
}
