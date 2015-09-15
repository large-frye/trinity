package controllers

import dao.UsersDAO
import play.api._
import play.api.mvc._
import scala.concurrent.ExecutionContext.Implicits.global
import play.api.libs.json._
import models.User

/**
 * Created by frye on 9/14/15.
 */
object Users extends Controller {

  def find(id: Int): Action[AnyContent] = Action.async { implicit request =>
    UsersDAO.findById(id).map(user => Ok(Json.toJson(Seq(user))))
  }

  def all(): Action[AnyContent] = Action.async { implicit request =>
    UsersDAO.find().map(user => Ok(Json.toJson(user)))
  }

  def create() = Action(BodyParsers.parse.json) { request =>
    request.session.get("authenticated").map { user =>
      val user = request.body.validate[User]
      user.fold(
        errors => {
          BadRequest(Json.obj("status" -> "KO", "message" -> JsError.toFlatJson(errors)))
        },
        user => {
          println(Json.toJson(user))
          Ok(Json.toJson(user))
        }

      )
    }.getOrElse {
      Unauthorized("No user found -> user not authenticated.")
    }

  }

}
