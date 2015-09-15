package models

import java.text.SimpleDateFormat
import java.sql._

import slick.driver.MySQLDriver.api._

case class User(id: Int,
                 email: String,
                 username: String = "",
                 password: String,
                 logins: Int = 0,
                 lastLogin: Option[Int] = None,
                 createdOnUtc: Option[Timestamp] = None,
                 status: Boolean = false) {
}

class Users (tag: Tag) extends Table[User](tag, "users") {

  def id = column[Int]("id", O.AutoInc, O.PrimaryKey)
  def email = column[String]("email", O.Length(254, varying = true))
  def username = column[String]("username", O.Length(32, varying=true), O.Default(""))
  def password = column[String]("password", O.Length(64, varying=true))
  def logins = column[Int]("logins", O.Default(0))
  def lastLogin = column[Option[Int]]("last_login", O.Default(None))
  def createdOnUtc = column[Option[Timestamp]]("created_on_utc", O.Default(None))
  def status = column[Boolean]("status", O.Default(false))

  def index1 = index("uniq_email", email, unique=true)
  def index2 = index("uniq_username", username, unique=true)

  def * = (id, email, username, password, logins, lastLogin, createdOnUtc, status) <> ((User.apply _).tupled, User.unapply)
}

object User {

  import play.api.libs.json._
  import play.api.libs.json.Reads._ // Custom validation helpers
  import play.api.libs.functional.syntax._ // Combinator syntax
  import java.sql.Timestamp

  implicit val rds: Reads[Timestamp] = (__ \ "time").read[Long].map{ long => new Timestamp(long) }
  implicit val wrs: Writes[Timestamp] = (__ \ "time").write[Long].contramap{ (a: Timestamp) => a.getTime }

  implicit val userWrites: Writes[User] = (
    (JsPath \ "id").write[Int] and
      (JsPath \ "email").write[String] and
      (JsPath \ "username").write[String] and
      (JsPath \ "password").write[String] and
      (JsPath \ "logins").write[Int] and
      (JsPath \ "lastLogin").writeNullable[Int] and
      (JsPath \ "createdOnUtc").writeNullable[Timestamp] and
      (JsPath \ "status").write[Boolean]
    )(unlift(User.unapply))

  implicit val userReads: Reads[User] = (
    (JsPath \ "id").read[Int] and
    (JsPath \ "email").read[String] and
    (JsPath \ "username").read[String] and
    (JsPath \ "password").read[String] and
    (JsPath \ "logins").read[Int] and
    (JsPath \ "lastLogin").readNullable[Int] and
    (JsPath \ "createdOnUtc").readNullable[Timestamp] and
    (JsPath \ "status").read[Boolean]
  )(User.apply _)

  implicit val userFormat: Format[User] =
    Format(userReads, userWrites)
}
