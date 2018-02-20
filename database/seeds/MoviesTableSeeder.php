<?php

use Illuminate\Database\Seeder;
use App\Movie;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $movie =[];
      $date = new DateTime();

      $movie[] = array (
        'title'   =>'Forrest Gump',
        'release_date' => null,
        'year'    => 1994,
        'runtime' =>'142 min',
        'director' =>'Robert Zemeckis',
        'writers'   =>'Winston Groom (novel), Eric Roth (screenplay)',
        'actors'   =>'Tom Hanks, Rebecca Williams, Sally Field, Michael Conner Humphreys',
        'plot'     =>'Forrest Gump is a simple man with a low I.Q. but good intentions. He is running through childhood with his best and only friend Jenny. His \'mama\' teaches him the ways of life and leaves him to choose his destiny. Forrest joins the army for service in Vietnam, finding new friends called Dan and Bubba, he wins medals, creates a famous shrimp fishing fleet, inspires people to jog, starts a ping-pong craze, creates the smiley, writes bumper stickers and songs, donates to people and meets the president several times. However, this is all irrelevant to Forrest who can only think of his childhood sweetheart Jenny Curran, who has messed up her life. Although in the end all he wants to prove is that anyone can love anyone.',
        'awards'    =>'Won 6 Oscars. Another 39 wins & 66 nominations.',
        'poster'    =>'https://images-na.ssl-images-amazon.com/images/M/MV5BNWIwODRlZTUtY2U3ZS00Yzg1LWJhNzYtMmZiYmEyNmU1NjMzXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_SX300.jpg',
        'imdb_id'   =>'tt0109830',
        'production' =>'Paramount Pictures',
        'website'    =>'http://www.paramount.com/movies/forrest-gump/',
        'genre'    =>'Drama, Romance',
        'status'  => 'out',
        'moderation'  => 'ok',
        'created_at' => $date->format('Y-m-d H:i:s'),
        'updated_at' => $date->format('Y-m-d H:i:s'),
      );

      $movie[] = array (
        'title'   =>'The Dark Knight Rises',
        'release_date' => null,
        'year'    => 2012,
        'runtime' =>'164 min',
        'director' =>'Christopher Nolan',
        'writers'   =>'Jonathan Nolan (screenplay), Christopher Nolan (screenplay), Christopher Nolan (story), David S. Goyer (story), Bob Kane (characters)',
        'actors'   =>'Christian Bale, Gary Oldman, Tom Hardy, Joseph Gordon-Levitt',
        'plot'     =>'Despite his tarnished reputation after the events of The Dark Knight, in which he took the rap for Dent\'s crimes, Batman feels compelled to intervene to assist the city and its police force which is struggling to cope with Bane\'s plans to destroy the city.',
        'awards'    =>'Nominated for 1 BAFTA Film Award. Another 38 wins & 101 nominations.',
        'poster'    =>'https://images-na.ssl-images-amazon.com/images/M/MV5BMTk4ODQzNDY3Ml5BMl5BanBnXkFtZTcwODA0NTM4Nw@@._V1_SX300.jpg',
        'imdb_id'   =>'tt1345836',
        'production' =>'Warner Bros. Pictures',
        'website'    =>'http://www.thedarkknightrises.com/',
        'genre'    =>'Action, Thriller',
        'status'  => 'out',
        'moderation'  => 'ok',
        'created_at' => $date->format('Y-m-d H:i:s'),
        'updated_at' => $date->format('Y-m-d H:i:s'),
      );

      $movies[] = array (
        'title'  => 'The Lord of the Rings: The Return of the King',
        'release_date' => null,
        'year' => 2003,
        'runtime' => '201 min',
        'director' => 'Peter Jackson',
        'writers' => 'J.R.R. Tolkien (novel), Fran Walsh (screenplay), Philippa Boyens (screenplay), Peter Jackson (screenplay)',
        'actors' => 'Noel Appleby, Ali Astin, Sean Astin, David Aston',
        'plot' => 'The final confrontation between the forces of good and evil fighting for control of the future of Middle-earth. Hobbits: Frodo and Sam reach Mordor in their quest to destroy the "one ring", while Aragorn leads the forces of good against Sauron\'s evil army at the stone city of Minas Tirith.',
        'awards' => 'Won 11 Oscars. Another 197 wins & 122 nominations.',
        'poster' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BYWY1ZWQ5YjMtMDE0MS00NWIzLWE1M2YtODYzYTk2OTNlYWZmXkEyXkFqcGdeQXVyNDUyOTg3Njg@._V1_SX300.jpg',
        'imdb_id' => 'tt0167260',
        'production' => 'New Line Cinema',
        'website' => 'http://www.lordoftherings.net/',
        'genre' => 'Adventure, Drama, Fantasy',
        'status' => 'out',
        'moderation'  => 'ok',
        'created_at' => $date->format('Y-m-d H:i:s'),
        'updated_at' => $date->format('Y-m-d H:i:s'),
      );

      $movie[] = array (
        'title'  => 'Interstellar',
        'release_date' => null,
        'year' => 2014,
        'runtime' => '169 min',
        'director' => 'Christopher Nolan',
        'writers' => 'Jonathan Nolan, Christopher Nolan',
        'actors' => 'Ellen Burstyn, Matthew McConaughey, Mackenzie Foy, John Lithgow',
        'plot' => 'Earth\'s future has been riddled by disasters, famines, and droughts. There is only one way to ensure mankind\'s survival: Interstellar travel. A newly discovered wormhole in the far reaches of our solar system allows a team of astronauts to go where no man has gone before, a planet that may have the right environment to sustain human life.',
        'awards' => 'Won 1 Oscar. Another 43 wins & 143 nominations.',
        'poster' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BZjdkOTU3MDktN2IxOS00OGEyLWFmMjktY2FiMmZkNWIyODZiXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_SX300.jpg',
        'imdb_id' => 'tt0816692',
        'production' => 'Paramount Pictures',
        'website' => 'http://www.InterstellarMovie.com/',
        'genre' => 'Adventure, Drama, Sci-Fi',
        'status' => 'out',
        'moderation'  => 'ok',
        'created_at' => $date->format('Y-m-d H:i:s'),
        'updated_at' => $date->format('Y-m-d H:i:s'),
      );

      $movie[] = array (
        'title'  => 'Inception',
        'release_date' => null,
        'year' => 2010,
        'runtime' => '148 min',
        'director' => 'Christopher Nolan',
        'writers' => 'Christopher Nolan',
        'actors' => 'Leonardo DiCaprio, Joseph Gordon-Levitt, Ellen Page, Tom Hardy',
        'plot' => 'Dom Cobb is a skilled thief, the absolute best in the dangerous art of extraction, stealing valuable secrets from deep within the subconscious during the dream state, when the mind is at its most vulnerable. Cobb\'s rare ability has made him a coveted player in this treacherous new world of corporate espionage, but it has also made him an international fugitive and cost him everything he has ever loved. Now Cobb is being offered a chance at redemption. One last job could give him his life back but only if he can accomplish the impossible - inception. Instead of the perfect heist, Cobb and his team of specialists have to pull off the reverse: their task is not to steal an idea but to plant one. If they succeed, it could be the perfect crime. But no amount of careful planning or expertise can prepare the team for the dangerous enemy that seems to predict their every move. An enemy that only Cobb could have seen coming.',
        'awards' => 'Won 4 Oscars. Another 152 wins & 204 nominations.',
        'poster' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BMjAxMzY3NjcxNF5BMl5BanBnXkFtZTcwNTI5OTM0Mw@@._V1_SX300.jpg',
        'imdb_id' => 'tt1375666',
        'production' => 'Warner Bros. Pictures',
        'website' => 'http://inceptionmovie.warnerbros.com/',
        'genre' => 'Action, Adventure, Sci-Fi',
        'status' => 'out',
        'moderation'  => 'ok',
        'created_at' => $date->format('Y-m-d H:i:s'),
        'updated_at' => $date->format('Y-m-d H:i:s'),
      );

      $movie[] = array (
        'title'  => 'Gladiator',
        'release_date' => null,
        'year' => 2000,
        'runtime' => '155 min',
        'director' => 'Ridley Scott',
        'writers' => 'David Franzoni (story), David Franzoni (screenplay), John Logan (screenplay), William Nicholson (screenplay)',
        'actors' => 'Russell Crowe, Joaquin Phoenix, Connie Nielsen, Oliver Reed',
        'plot' => 'Maximus is a powerful Roman general, loved by the people and the aging Emperor, Marcus Aurelius. Before his death, the Emperor chooses Maximus to be his heir over his own son, Commodus, and a power struggle leaves Maximus and his family condemned to death. The powerful general is unable to save his family, and his loss of will allows him to get captured and put into the Gladiator games until he dies. The only desire that fuels him now is the chance to rise to the top so that he will be able to look into the eyes of the man who will feel his revenge.',
        'awards' => 'Won 5 Oscars. Another 53 wins & 101 nominations.',
        'poster' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BMDliMmNhNDEtODUyOS00MjNlLTgxODEtN2U3NzIxMGVkZTA1L2ltYWdlXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_SX300.jpg',
        'imdb_id' => 'tt0172495',
        'production' => 'Dreamworks Distribution LLC',
        'website' => 'http://www.gladiator-thefilm.com',
        'genre' => 'Action, Adventure, Drama',
        'status' => 'out',
        'moderation'  => 'ok',
        'created_at' => $date->format('Y-m-d H:i:s'),
        'updated_at' => $date->format('Y-m-d H:i:s'),
      );

      $movie[] = array (
        'title'  => 'Saving Private Ryan',
        'release_date' => null,
        'year' => 1998,
        'runtime' => '169 min',
        'director' => 'Steven Spielberg',
        'writers' => 'Robert Rodat',
        'actors' => 'Tom Hanks, Tom Sizemore, Edward Burns, Barry Pepper',
        'plot' => 'Opening with the Allied invasion of Normandy on 6 June 1944, members of the 2nd Ranger Battalion under Cpt. Miller fight ashore to secure a beachhead. Amidst the fighting, two brothers are killed in action. Earlier in New Guinea, a third brother is KIA. Their mother, Mrs. Ryan, is to receive all three of the grave telegrams on the same day. The United States Army Chief of Staff, George C. Marshall, is given an opportunity to alleviate some of her grief when he learns of a fourth brother, Private James Ryan, and decides to send out 8 men (Cpt. Miller and select members from 2nd Rangers) to find him and bring him back home to his mother...',
        'awards' => 'Won 5 Oscars. Another 74 wins & 74 nominations.',
        'poster' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BZjhkMDM4MWItZTVjOC00ZDRhLThmYTAtM2I5NzBmNmNlMzI1XkEyXkFqcGdeQXVyNDYyMDk5MTU@._V1_SX300.jpg',
        'imdb_id' => 'tt0120815',
        'production' => 'Paramount Pictures',
        'website' => 'http://https://www.facebook.com/SavingPrivateRyanMovie',
        'genre' => 'Drama, War',
        'status' => 'out',
        'moderation'  => 'ok',
        'created_at' => $date->format('Y-m-d H:i:s'),
        'updated_at' => $date->format('Y-m-d H:i:s'),
      );

      $movie[] = array (
        'title'  => 'Angels & Demons',
        'release_date' => null,
        'year' => 2009,
        'runtime' => '138 min',
        'director' => 'Ron Howard',
        'writers' => 'David Koepp (screenplay), Akiva Goldsman (screenplay), Dan Brown (novel)',
        'actors' => 'Tom Hanks, Ewan McGregor, Ayelet Zurer, Stellan Skarsgård',
        'plot' => 'Following the murder of a physicist, Father Silvano Bentivoglio, a symbolist, Robert Langdon, and a scientist, Vittoria Vetra, are on an adventure involving a secret brotherhood, the Illuminati. Clues lead them all around the Vatican, including the four altars of science, Earth, Air, Fire and Water. An assassin, working for the Illuminati, has captured four cardinals, and murders each, painfully. Robert and Vittoria also are searching for a new very destructive weapon that could kill millions.',
        'awards' => '1 win & 5 nominations.',
        'poster' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BMjEzNzM2MjgxMF5BMl5BanBnXkFtZTcwNTQ1MTM0Mg@@._V1_SX300.jpg',
        'imdb_id' => 'tt0808151',
        'production' => 'Sony/Columbia Pictures',
        'website' => 'http://www.angelsanddemons.com/',
        'genre' => 'Mystery, Thriller',
        'status' => 'out',
        'moderation'  => 'ok',
        'created_at' => $date->format('Y-m-d H:i:s'),
        'updated_at' => $date->format('Y-m-d H:i:s'),
      );

      $movie[] = array (
        'title'  => 'Edge of Tomorrow',
        'release_date' => null,
        'year' => 2014,
        'runtime' => '113 min',
        'director' => 'Doug Liman',
        'writers' => 'Christopher McQuarrie (screenplay by), Jez Butterworth (screenplay by), John-Henry Butterworth (screenplay by), Hiroshi Sakurazaka (based on the novel "All You Need Is Kill" by)',
        'actors' => 'Tom Cruise, Emily Blunt, Brendan Gleeson, Bill Paxton',
        'plot' => 'An alien race has hit the Earth in an unrelenting assault, unbeatable by any military unit in the world. Major William Cage (Cruise) is an officer who has never seen a day of combat when he is unceremoniously dropped into what amounts to a suicide mission. Killed within minutes, Cage now finds himself inexplicably thrown into a time loop-forcing him to live out the same brutal combat over and over, fighting and dying again...and again. But with each battle, Cage becomes able to engage the adversaries with increasing skill, alongside Special Forces warrior Rita Vrataski (Blunt). And, as Cage and Vrataski take the fight to the aliens, each repeated encounter gets them one step closer to defeating the enemy!',
        'awards' => '11 wins & 37 nominations.',
        'poster' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BMTc5OTk4MTM3M15BMl5BanBnXkFtZTgwODcxNjg3MDE@._V1_SX300.jpg',
        'imdb_id' => 'tt1631867',
        'production' => 'Warner Bros. Pictures',
        'website' => 'http://www.edgeoftomorrowmovie.com',
        'genre' => 'Action, Adventure, Sci-Fi',
        'status' => 'out',
        'moderation'  => 'ok',
        'created_at' => $date->format('Y-m-d H:i:s'),
        'updated_at' => $date->format('Y-m-d H:i:s'),
      );

      $movie[] = array (
        'title'  => 'Pirates of the Caribbean: The Curse of the Black Pearl',
        'release_date' => null,
        'year' => 2003,
        'runtime' => '143 min',
        'director' => 'Gore Verbinski',
        'writers' => 'Ted Elliott (screen story), Terry Rossio (screen story), Stuart Beattie (screen story), Jay Wolpert (screen story), Ted Elliott (screenplay), Terry Rossio (screenplay)',
        'actors' => 'Johnny Depp, Geoffrey Rush, Orlando Bloom, Keira Knightley',
        'plot' => 'This swash-buckling tale follows the quest of Captain Jack Sparrow, a savvy pirate, and Will Turner, a resourceful blacksmith, as they search for Elizabeth Swann. Elizabeth, the daughter of the governor and the love of Will\'s life, has been kidnapped by the feared Captain Barbossa. Little do they know, but the fierce and clever Barbossa has been cursed. He, along with his large crew, are under an ancient curse, doomed for eternity to neither live, nor die. That is, unless a blood sacrifice is made.',
        'awards' => 'Nominated for 5 Oscars. Another 36 wins & 96 nominations.',
        'poster' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BNGYyZGM5MGMtYTY2Ni00M2Y1LWIzNjQtYWUzM2VlNGVhMDNhXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_SX300.jpg',
        'imdb_id' => 'tt0325980',
        'production' => 'Buena Vista Pictures',
        'website' => 'http://disney.go.com/disneyvideos/liveaction/pirates/main_site/main.html',
        'genre' => 'Action, Adventure, Fantasy',
        'status' => 'out',
        'moderation'  => 'ok',
        'created_at' => $date->format('Y-m-d H:i:s'),
        'updated_at' => $date->format('Y-m-d H:i:s'),
      );

      $movie[] = array (
        'title'  => 'Thor: Ragnarok',
        'release_date' => null,
        'year' => 2017,
        'runtime' => '130 min',
        'director' => 'Taika Waititi',
        'writers' => 'Eric Pearson, Craig Kyle, Christopher Yost, Stan Lee (based on the comics by), Larry Lieber (based on the comics by), Jack Kirby (based on the comics by)',
        'actors' => 'Chris Hemsworth, Tom Hiddleston, Cate Blanchett, Idris Elba',
        'plot' => 'Thor is imprisoned on the other side of the universe and finds himself in a race against time to get back to Asgard to stop Ragnarok, the destruction of his homeworld and the end of Asgardian civilization, at the hands of an all-powerful new threat, the ruthless Hela.',
        'awards' => '2 wins & 14 nominations.',
        'poster' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BMjMyNDkzMzI1OF5BMl5BanBnXkFtZTgwODcxODg5MjI@._V1_SX300.jpg',
        'imdb_id' => 'tt3501632',
        'production' => 'Walt Disney Pictures',
        'website' => 'http://movies.disney.com/thor-ragnarok',
        'genre' => 'Action, Adventure, Comedy',
        'status' => 'out',
        'moderation'  => 'ok',
        'created_at' => $date->format('Y-m-d H:i:s'),
        'updated_at' => $date->format('Y-m-d H:i:s'),
      );

      $movie[] = array (
        'title'  => 'Avengers: Infinity War',
        'release_date' => '2018-04-25',
        'year' => 2018,
        'runtime' => 'N/A',
        'director' => 'Anthony Russo, Joe Russo',
        'writers' => 'Christopher Markus (screenplay), Stephen McFeely (screenplay), Stan Lee (based on the comics by), Jack Kirby (based on the comics by), Jim Starlin (comic book story), George Pérez (comic book story), Ron Lim (comic book story), Steve Ditko (characters created by: Spider-Man & Doctor Strange), Jack Kirby (character created by: Captain America), Joe Simon (character created by: Captain America), Jim Starlin (characters created by: Thanos,  Gamora & Drax)',
        'actors' => 'Chris Hemsworth, Robert Downey Jr, Sebastian Stan, Scarlett Johansson, Chris Evans, Tom Hiddleston, Chris Pratt',
        'plot' => 'The Avengers and their allies must be willing to sacrifice all in an attempt to defeat the powerful Thanos before his blitz of devastation and ruin puts an end to the universe.',
        'poster' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BMTc0MjA1OTMxOV5BMl5BanBnXkFtZTgwMzM1NDcyNDM@._V1_SX300.jpg',
        'awards' => 'N/A',
        'imdb_id' => 'tt4154756',
        'production' => 'Walt Disney Pictures',
        'website' => 'N/A',
        'genre' => 'Action, Adventure, Fantasy',
        'status' => 'Incoming',
        'moderation'  => 'ok',
        'created_at' => $date->format('Y-m-d H:i:s'),
        'updated_at' => $date->format('Y-m-d H:i:s'),
      );

      DB::table('movies')->insert($movie);

    }
}
