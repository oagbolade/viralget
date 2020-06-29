<?php

namespace App\Http\Controllers\Cronjobs;

// use Illuminate\Http\Request;

class Keywords
{
    private $_keywords = [
        "technology" => [
            "category_id" => "8",
            "keywords" => [
                "coding", "tech", "software", "developer", "science", "computer", "programming", "gadget", "websites",
                "tech news", "information technology", "health technology", "artificial intelligence", "technology", "camera",
                "nanotechnology", "encryption", "science and technology", "new technology",
                "computer software engineer", "5g technology", "innovation technology", "mobile developer",
                "latest tech news", "health technology", "edtech", "medical technology", "digital technology",
                "science technology", "face recognition app", "financial technology", "electronic gadgets",
                "communication technology", "mobile device", "cloud technology", "tablet computers",
                "ai technology", "best gadgets", "tech zone", "mobile technology", "techtalk",
                "latest gadgets", "cool tech gadgets", "unboxing", "tech house", "techie",
                "techy", "Technical Analysis", "technopreneur", "techlife", "tech startup",
                "Technology Rocks", "tech geek", "naija tech", "techcrunch", "tech week",
                "tech addict", "tech trends", "tech blogger", "future technology", "tech fest",
                "tech life", "fintech", "techouse", "technologies", "techie", "tech world",
                "tech news", "tech wear", "tech gadgets", "computers", "software", "electronics",
                "gadgets", "innovation", "device", "apple", "smartphone", "engineering",
                "computer science", "design", "android", "samsung", "programmer",
                "python", "mobile", "web developer", "electronic engineer", "java", "javascript",
                "hacker", "linux", "future tech", "internet of things", "techlife", "new technology",
                "automation", "technology news", "techlover", "information technology", "tech world",
                "tech blog", "laptops", "tech savvy", "smart technology", "techcrunch", "technology lover",
                "technology trends", "computer technology", "technology blog", "techaddict", "windows7",
                "tech updates", "computer world", "consumer electronics", "programmers life", " smart gadget",
                "tech facts", "tech nerds", "tech lovers", "eletronics", "tech memes", "tech insider",
                "tech tips", "daily tech", "tech portal", "tech talk", "tech love", "hackathon"
            ]
        ],
        "movie" => [
            "category_id" => "009",
            "keywords" => [
                "Review", "movie review", "movie", "film", "film review", "writer",
                "movies", "films", "write", "writing", "sequel", "director", "directing", "cinema",
                "filmmaking", "tv", "filmmakers", "television", "actor", "actress", "character",
                "behind the scene", "bye", "crew", "cast", "directors", "reviews", "movie critic",
                "creative writer", "movie reviewer", "writers", "movie industry", "film industry",
                "filmcritic", "filmreviews", "moviecritic", "moviereviewer", "moviecollection",
                "movielover", "filmreview", "moviecollector", "moviefreak", "movierecommendation",
                "moviereview", "moviereviews", "horrormoviereviews", "horrormoviereview", "moviereviewers",
                "movie", "Movies", "moviestar", "MovieNight", "moviequotes", "movietime", "moviemaking",
                "movieposter", "movielover", "movieset", "moviefacts", "moviebuff", "MovieDay",
                "moviemaker", "moviereview", "moviequote", "MovieDirector", "movienews", "moviedate",
                "MovieStars", "movietheater", "moviescene", "moviemagic", "MOVIEART", "MovieAddict",
                "moviecollection", "MovieProduction", "moviepremiere", "moviegeek", "movieLif"
            ]
        ],
        "locations" => [
            "Abia", "Umuahia", "Adamawa", "Yola", "Akwa Ibom", "Uyo", "Anambra", "Awka", "Bauchi",
            "Bayelsa", "Yenagoa", "Benue", "Makurdi", "Borno", "Maiduguri", "Cross River",    "Calabar",
            "Delta", "Asaba", "Ebonyi", "Abakaliki", "Edo", "Benin", "Ekiti",    "Ado Ekiti",
            "Enugu", "Gombe", "Imo", "Owerri", "Jigawa", "Dutse", "Kaduna",
            "Kano",  "Katsina", "Kebbi", "Kogi", "Lokoja", "Kwara", "Ilorin", "Ikeja",
            "Nasarawa", "Lafia", "Niger", "Minna", "Ogun", "Abeokuta", "Ondo", "Akure", "Osun",    "Oshogbo",
            "Oyo", "Ibadan", "Plateau", "Jos", "Rivers", "Port Harcourt", "Sokoto",
            "Taraba", "Jalingo", "Yobe", "Damaturu", "Zamfara", "Gusau", "Lekki", "Ajah",
            "NG", "Nigeria", "Ikoyi", "Lagos", "Abuja"
        ],
    ];

    public function getKeywords($category)
    {
        return $this->_keywords[$category];
    }
    
    public function getLocations()
    {
        return $this->_keywords['locations'];
    }
}
