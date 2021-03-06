package com.viavilab.hdwallpaper;

import com.actionbarsherlock.app.SherlockActivity;
import android.os.Bundle;
import android.content.Intent;

public class SplashActivity extends SherlockActivity
{

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		 
		super.onCreate(savedInstanceState);
		setContentView(R.layout.splash);
		getSupportActionBar().hide();
		
		Thread splashThread = new Thread() {
			@Override
			public void run() {
				try {
					int waited = 0;
					while (waited < 2000) {
						sleep(100);
						waited += 100;
					}
				} catch (InterruptedException e) {
					// do nothing
				} finally {
			 
					Intent i = new Intent(getApplicationContext(),MainActivity.class);
					startActivity(i);
					finish();
					 
				}
			}
		};
		splashThread.start();
	}
	
}