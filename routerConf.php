<?php
router::get("/","home",function() {
	return view::show("home");
})->name("home");

router::get("/sort/{page}/{name}/{type}","home",function() {
	return view::show("home");
})->name("sort");

router::get("/newtask","login",function() {
	return view::show("newtask");
})->name("newTask");

router::get("/task/{id}","task",function() {
	return view::show("task");
})->name("taskShow");

router::get("/task/{id}/{type}","task",function() {
	return view::show("task");
})->name("taskShowRes");

router::post("/taskdo/{type}/{id}","formTaskWorker")->name("taskWork");

router::get("/login/{type}","login",function() {
	return view::show("login");
})->name("login");

router::post("/login/do/{type}","formLoginWorker")->name("loginWork");

router::get("/admin","admin",function() {
	return view::show("admin");
});